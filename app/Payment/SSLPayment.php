<?php

namespace App\Payment;
use App\Payment\Contracts\PaymentInterface;

class SSLPayment implements PaymentInterface
{
    public function processPayment($amount, $currency)
    {
        return [
            'status' => 'success',
            'method' => 'SSLCommerz',
            'amount' => $amount,
            'currency' => $currency
        ]; 
    }
}