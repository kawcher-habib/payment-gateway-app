<?php


namespace App\Payment;
use App\Payment\Contracts\PaymentInterface;
use App\Payment\Dto\PaymentData;
use Illuminate\Support\Facades\Http;
class StripePayment implements PaymentInterface
{
    protected $config;

    public function __construct()
    {
        $this->config = config('payment.stripe');
    }

    public function processPayment($data)
    {
        $body = [
            'value_a' => 'ref001_A',
            'value_b' => 'ref002_B',
            'value_c' => 'ref003_C',
            'value_d' => 'ref004_D'
        ];

        $response = Http::withOptions(['verify' => false])->asForm()->post($this->config['base_url'] . '/payment', $body);
        return $response->json();
    }
}
