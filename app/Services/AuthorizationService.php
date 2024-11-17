<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Gate;

class AuthorizationService
{
    /**
     * @param Client $client
     *
     * @return bool
     */
    public function userCanUpdateCashLoan(Client $client): bool
    {
        if (!$client->cashLoan()->exists()) {
            return true;
        }

        return Gate::allows('update-cash-loan', $client->cashLoan);
    }

    /**
     * @param Client $client
     *
     * @return bool
     */
    public function userCanUpdateHomeLoan(Client $client): bool
    {
        if (!$client->homeLoan()->exists()) {
            return true;
        }

        return Gate::allows('update-home-loan', $client->homeLoan);
    }
}
