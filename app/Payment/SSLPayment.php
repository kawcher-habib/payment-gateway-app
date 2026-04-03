<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentInterface;
use App\Payment\Dto\PaymentData;
use Illuminate\Support\Facades\Http;

class SSLPayment implements PaymentInterface
{
    protected $config;

    public function __construct()
    {
        $this->config = config('payment.ssl');
    }

    public function processPayment($data)
    {

// dd($data);

        $body = [
            'store_id' => $this->config['store_id'],
            'store_passwd' => $this->config['store_password'],
            'total_amount' => $data->amount,
            'currency' => $data->currency,
            'tran_id' => $data->orderId,
            'success_url' => $this->config['callback_url'],
            'fail_url' => $this->config['callback_url'],
            'cancel_url' => $this->config['callback_url'],
            'cus_name' => 'John Doe',
            'cus_email' => 'john.doe@example.com'
        ];

        $respone = Http::asForm()->post($this->config['base_url'] . '/gwprocess/v4/api.php', $body);
        return $respone->json();
    }
}
