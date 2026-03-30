<?php

namespace App\Payment\Contracts;

interface PaymentInterface{
    public function processPayment($amount, $currency);
}