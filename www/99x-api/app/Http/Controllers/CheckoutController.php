<?php
namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CheckoutController extends Controller
{
    public function __construct(private PaymentGateway $payments) {}
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
            'currency' => ['required', 'string', 'size:3'],
            'token' => ['required', 'string'],
        ]);
        $amountInCents = (int) round($validated['amount'] * 100);
        $chargeId = $this->payments->charge(
            $amountInCents,
            strtolower($validated['currency']),
            $validated['token']
        );
        return response()->json(['charge_id' => $chargeId]);
    }
}





