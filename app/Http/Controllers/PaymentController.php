<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Veritrans_Transaction;
use App\Models\Plan;
use App\User;
use App\Models\Person;
use App\Models\Schedule;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\Voucher;
use App\Models\TransactionHasStatus;
use App\Models\OrderHasStatus;

class PaymentController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($plan_id){
        // dd($request);
        $data['plan'] = Plan::with('vouchers','schedules.schedule_details')->find($plan_id);
        if (Auth::check()) {
            $data['user'] = User::find(Auth::user()->id);
            $data['persons'] = Person::get();
        }
        return view('payments.detail',$data);
    }

    public function checkout(Request $request){
        // dd($request);
        $request->validate([
            "order.plan_id"=>"required",
            "order.schedule_id"=>"required",
            "order.persons.*.birthdate"=>"required",
            "order.persons.*.firstname"=>"required",
            "order.persons.*.lastname"=>"required",
            "order.persons.*.identity_number"=>"required",
            "order.persons.*.address"=>"required",
            "order.persons.*.email"=>"required",
            "order.persons.*.phone"=>"required",
            "order.persons.*.relation_status"=>"required",
            "order.persons.*.profession"=>"required",
            "order.persons.*.gender"=>"required",
            "order.persons"=>[function($attribute, $value, $fail)use($request){
                if($request['order']['schedule_id'] != null){
                    $schedule = Schedule::find($request['order']['schedule_id']);
                    $persons_count = Person::
                    with(['order'=>function($query)use($request){
                        $query->where('schedule_id',$request['schedule_id']);
                    }])
                    ->whereHas('order',function($query)use($request){
                        $query->where('schedule_id',$request['schedule_id']);
                    })
                    ->count();
                    $request_persons_count = count($request['order']['persons']);
                    if($persons_count+$request_persons_count > $schedule->capacity){
                        $fail(':Kapasitas sudah penuh');
                    } 
                } else {
                    $fail(':periksa kembali isian anda');
                }

            }]
        ]);

        $schedule = Schedule::find($request['order']['schedule_id']);
        $plan = Plan::find($request['order']['plan_id']);

        $total_amount = $plan->price - (($plan->price*$plan->discount)/100);
        $payment_status = "Cash"; 

        if(isset($request['voucher'])){
            $voucher = Voucher::find($request['voucher']['id']);
            $total_amount = $total_amount-$voucher->value;
        }

        if(isset($request['dp'])){
            $dp = ($total_amount*10)/100;
            $payment_status = "DP";
        }

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->plan_id = $request['order']['plan_id'];
        $order->schedule_id = $request['order']['schedule_id'];
        $order->quantity = count($request['order']['persons']);
        $order->total_amount = $total_amount;
        $order->start_at = $schedule->start_at;
        $order->end_at = $schedule->end_at;
        $order->save();

        $order_has_status = new OrderHasStatus;
        $order_has_status->order_id = $order->id;
        $order_has_status->order_status_id = 1;
        $order_has_status->save();

        $transaction = new Transaction;
        $transaction->order_id = $order->id;
        $transaction->value = $dp ?? $order->total_amount;
        $transaction->save();

        $transaction_has_status = new TransactionHasStatus;
        $transaction_has_status->transaction_id = $transaction->id;
        $transaction_has_status->transaction_status_id = 1;
        $transaction_has_status->save();

        $payload = [
            'transaction_details' => [
                'order_id'      => $transaction->id,
                'gross_amount'  => $order->total_amount,
            ],
            'customer_details' => [
                'first_name'    => Auth::user()->name,
                'email'         => Auth::user()->email,
                // 'phone'         => '08888888888',
                // 'address'       => '',
            ],
            'item_details' => [
                [
                    'id'       => $transaction->id,
                    'price'    => $dp ?? $order->total_amount,
                    'quantity' => $order->quantity,
                    'name'     => $plan->name
                ]
            ]
        ];

        $snapToken = Veritrans_Snap::getSnapToken($payload);

        $transaction->snap_token = $snapToken;
        $transaction->update();

        return response()->json([
            "snap_token"=>$snapToken,
            "order"=>$order
        ]);

    }

    public function success($order_id){
        $user = User::with(['orders'=>function($query)use($order_id){
            $query->where('id',$order_id);
        }])
        ->whereHas('orders',function($query)use($order_id){
           $query->where('id',$order_id); 
        })
        ->find(Auth::user()->id);

        if($user){
            return view('payments.success',["user"=>$user]);
        } else {
            return abort(404);
        }
    }

    public function getstatus($order_id){
        // $status = Veritrans_Transaction::status($transaction_id);
        // dd($status);

        $transaksi = Transaction::find($order_id);

        $transaction_status = TransactionHasStatus::where('transaction_id',$transaksi->id)->first();
        $transaction_status->transaction_status_id = 2;
        $transaction_status->update();

        $order = Order::with('transactions.transaction_statuses')->find($transaksi->order_id);

        foreach ($order['transactions'] as $t => $transaction) {
            // menjumlahkan transaksi yang id 2 atau complete (telah melakukan transaksi)
            $transaction->transaction_statuses[0]->id == 2 ? $order->sum_transaction_value = $order->sum_transaction_value += $transaction->value : $order->sum_transaction_value = $order->sum_transaction_value += 0 ;
        }

        if ($order->total_amount == $order->sum_transaction_value) {

            $order_status = OrderHasStatus::where('order_id',$order->id)->first();
            $order_status->order_status_id = 3;
            $order_status->update();

        } else {

            $order_status = OrderHasStatus::where('order_id',$order->id)->first();
            $order_status->order_status_id = 2;
            $order_status->update();
            
        }

        return $order;
    }

}
