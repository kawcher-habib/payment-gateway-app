<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Payment\Contracts\PaymentInterface;
use App\Payment\Dto\PaymentData;
use App\Payment\PaymentFactory;
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

}
