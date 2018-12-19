<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
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

            }]
        ]);

        $schedule = Schedule::find($request['order']['schedule_id']);
        $plan = Plan::find($request['order']['plan_id']);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->plan_id = $request['order']['plan_id'];
        $order->schedule_id = $request['order']['schedule_id'];
        $order->quantity = count($request['order']['persons']);
        $order->total_amount = 10000;
        $order->start_at = $schedule->start_at;
        $order->end_at = $schedule->end_at;
        $order->save();

        $payload = [
            'transaction_details' => [
                'order_id'      => $order->id,
                'gross_amount'  => $order->amount,
            ],
            'customer_details' => [
                'first_name'    => Auth::user()->name,
                'email'         => Auth::user()->email,
                // 'phone'         => '08888888888',
                // 'address'       => '',
            ],
            'item_details' => [
                [
                    'id'       => $plan->name,
                    'price'    => $order->total_amount,
                    'quantity' => $order->quantity,
                    'name'     => ucwords(str_replace('_', ' ', $plan->name))
                ]
            ]
        ];

        $snapToken = Veritrans_Snap::getSnapToken($payload);
        
        $transaction = new Transaction;
        $transaction->order_id = $order->id;
        $transaction->payment_id = 1;
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return response()->json([
            "snap_token"=>$snapToken
        ]);

    }
}
