<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Payment\Contracts\PaymentInterface;
use App\Payment\Dto\PaymentData;
use App\Payment\PaymentFactory;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // protected $payment;

    // public function __construct(PaymentInterface $payment)
    // {
    //     $this->payment = $payment;
    // }



    public function placeOrder(Request $request)
    {

    /// User or customer[customer ID] and order details[Order ID, Amount, Currency, Payment method etc]
    /// 

    $data = new PaymentData(
        amount: $request->amount,
        currency: $request->currency,
        paymentMethod: $request->payment_method,
        customerId: $request->customer_id,
        orderId: $request->order_id
    );

    $payment = PaymentFactory::make($request->payment_method);
    
   
        $result = $payment->processPayment($data);
        return response()->json($result);
    }


    public function paymentCallback(Request $request)
    {
        // Handle the payment gateway callback here
        // You can verify the payment status and update your order accordingly

        $data = $request->all();

        // Assuming 'status' is the key for payment status
        if (isset($data['status']) && in_array(strtoupper($data['status']), ['SUCCESS', 'VALID', 'COMPLETED'])) {
            // Store data in transaction table
            $transaction = \App\Models\Transaction::create([
                'order_id' => $data['order_id'] ?? null,
                'customer_id' => $data['customer_id'] ?? null,
                'amount' => $data['amount'] ?? null,
                'currency' => $data['currency'] ?? null,
                'method' => $data['method'] ?? null,
                'gateway' => $data['gateway'] ?? 'ssl', // assuming SSL
                'tran_id' => $data['tran_id'] ?? null,
                'status' => 1, // success
            ]); 
            

            // Return response JSON with user log for back-end developer
            return response()->json([
                'status' => 'success',
                'message' => 'Transaction stored successfully',
                'transaction' => $transaction,
                'log' => 'Payment callback processed: Transaction ID ' . $transaction->id . ' created for order ' . ($data['order_id'] ?? 'N/A') . ' with status success.'
            ]);
        } else {
            // Handle failed or other statuses
            return response()->json([
                'status' => 'failed',
                'message' => 'Payment not successful',
                'data' => $data
            ]);
        }
    }

    public function cancleOrder(Request $request)
    {
        // Implement order cancellation logic here
    }

    public function refundOrder(Request $request)
    {
        // Implement order refund logic here
    }

    public function getOrderStatus(Request $request)
    {
        // Implement order status retrieval logic here
    }

}
