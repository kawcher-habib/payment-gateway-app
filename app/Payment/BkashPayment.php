<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentInterface;

class BkashPayment implements PaymentInterface
{
    public function processPayment($amount, $currency)
    {
        return [
            'status' => 'success',
            'method' => 'bKash',
            'amount' => $amount,
            'currency' => $currency
        ];
    }
}
