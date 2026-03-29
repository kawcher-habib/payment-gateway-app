<?php

namespace App\Providers;

use App\Payment\BkashPayment;
use App\Payment\Contracts\PaymentInterface;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentInterface::class, function ($app){
            $method = request()->input('payment_method');
            return match($method){
                'bkash' => new BkashPayment()
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
