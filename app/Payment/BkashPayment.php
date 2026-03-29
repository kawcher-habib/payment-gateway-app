<?php

namespace App\Payment;
use App\Payment\Contracts\PaymentInterface;

class BkashPayment implements PaymentInterface
{
    public function processPayment($amount, $currency, $paymentMethod)
    {
        return "Processing Bkash payment of $amount $currency using $paymentMethod.";
    }

}