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

class NotificationController extends Controller
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

    public function handling(){

        $notif = new Veritrans_Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                } 
                else {
                    // TODO set payment status in merchant's database to 'Success'
                    // echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        }
        else if ($transaction == 'settlement'){
            // TODO set payment status in merchant's database to 'Settlement'
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

            // echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
        } 
        else if($transaction == 'pending'){
            // TODO set payment status in merchant's database to 'Pending'
            // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } 
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }
        else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        }
        else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }
}
