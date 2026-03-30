<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Payment\Contracts\PaymentInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }



    public function placeOrder()
    {

    $amount = 40000;
    $crurrency = 'USD';
   
        $result = $this->payment->processPayment($amount, $crurrency);
        return response()->json($result);
    }

}
