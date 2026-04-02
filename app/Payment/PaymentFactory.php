<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentInterface;

class PaymentFactory
{
    public static function make(string $method): PaymentInterface
    {
        return match ($method) {
            'bkash' => new BkashPayment(),
            'ssl' => new SSLPayment(),
            default => throw new \Exception("Invalid payment method")
        };
    }
}
