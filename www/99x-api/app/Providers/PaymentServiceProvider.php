<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Services\Payments\StripePaymentGateway;

class PaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(\App\Services\PaymentGateway::class, function ($app) {
            $secret = config('services.stripe.secret');
            return new StripePaymentGateway($secret);
        });
    }
}