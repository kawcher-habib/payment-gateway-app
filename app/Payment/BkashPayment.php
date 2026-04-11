<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentInterface;

class BkashPayment implements PaymentInterface
{
   public function processPayment($data)
   {
       // Implement Bkash payment processing logic here
       // For demonstration, we'll just return a mock response
       return [
           'status' => 'success',
           'message' => 'Bkash payment processed successfully',
           'data' => $data
       ];
   }
}
