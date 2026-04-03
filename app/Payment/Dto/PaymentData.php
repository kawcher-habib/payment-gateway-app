<?php


namespace App\Payment\Dto;

class PaymentData
{
    public function __construct(
        public int $amount,
        public string $currency,
        public string $paymentMethod,
        public int $customerId,
        public int $orderId
    ) {}
}
