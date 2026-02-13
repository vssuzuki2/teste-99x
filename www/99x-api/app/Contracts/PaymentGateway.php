<?php
namespace App\Contracts;
interface PaymentGateway
{
    public function charge(int $amountInCents, string $currency, string $token): string;
}