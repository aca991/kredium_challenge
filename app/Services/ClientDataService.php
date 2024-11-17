<?php

namespace App\Services;

use App\Models\Client;

class ClientDataService
{
    private AuthorizationService $authorizationService;

    public function __construct(AuthorizationService $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    /**
     * @param Client $client
     * @param float|null $amount
     *
     * @return bool
     */
    public function upsertCashLoan(Client $client, ?float $amount): bool
    {
        if (!$this->authorizationService->userCanUpdateCashLoan($client)) {
            return true;
        }

        if (empty($amount) && $client->cashLoan()->exists()) {
            return $client->cashLoan->delete();
        }

        $cashLoan = $client->cashLoan()->updateOrCreate(
            ['client_id' => $client->id],
            ['amount' => $amount, 'user_id' => auth()->id()]
        );

        return !empty($cashLoan);
    }

    /**
     * @param Client $client
     * @param float|null $value
     * @param float|null $downPaymentAmount
     *
     * @return bool
     */
    public function upsertHomeLoan(Client $client, ?float $value, ?float $downPaymentAmount): bool
    {
        if (!$this->authorizationService->userCanUpdateHomeLoan($client)) {
            return true;
        }

        if (empty($value) && empty($downPaymentAmount) && $client->homeLoan()->exists()) {
            return $client->homeLoan->delete();
        }

        $homeLoan = $client->homeLoan()->updateOrCreate(
            ['client_id' => $client->id],
            [
                'value' => $value,
                'down_payment_amount' => $downPaymentAmount,
                'user_id' => auth()->id(),
            ]
        );

        return !empty($homeLoan);
    }
}
