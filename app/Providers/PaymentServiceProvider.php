<?php

namespace App\Providers;

use App\Payment\BkashPayment;
use App\Payment\Contracts\PaymentInterface;
use App\Payment\SSLPayment;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(PaymentInterface::class, function ($app){
        //     $method = request()->input('payment_method');
        //     // $method = 'bkash';
        //     return match($method){
        //         'bkash' => new BkashPayment(),
        //         'ssl' => new SSLPayment(),
        //         default => throw new \Exception("Invalid payment method")
        //     };
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
