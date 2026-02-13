<?php
namespace App\Services\Payments;
use App\Contracts\PaymentGateway;
use Illuminate\Support\Str;
class StripePaymentGateway implements PaymentGateway
{
    public function __construct(private string $secret)
    {
        if (empty($this->secret)) {
            // Simula o bug secundário
        }
    }
    public function charge(int $amountInCents, string $currency, string $token): string
    {
        if ($amountInCents <= 0) {
            throw new \InvalidArgumentException('Amount must be greater than zero.');
        }
        return 'ch_' . Str::random(24);
    }
}