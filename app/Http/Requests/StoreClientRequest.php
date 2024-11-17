<?php

namespace App\Http\Requests;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use App\Services\AuthorizationService;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    protected $errorBag = ClientController::ERROR_BAG;

    public function authorize(): bool
    {
        if (!$this->has('id')) {
            return true;
        }

        $authorizationService = null;
        $client = null;

        if ($this->filled('cash_loan_amount')) {
            /** @var AuthorizationService $authorizationService */
            $authorizationService = app(AuthorizationService::class);
            /** @var Client $client */
            $client = Client::find($this->get('id'));

            return $authorizationService->userCanUpdateCashLoan($client);
        }

        if ($this->filled('home_loan_value') && $this->filled('home_loan_down_payment_amount')) {
            if (empty($authorizationService)) {
                /** @var AuthorizationService $authorizationService */
                $authorizationService = app(AuthorizationService::class);
            }

            if (empty($client)) {
                /** @var Client $client */
                $client = Client::find($this->get('id'));
            }

            return $authorizationService->userCanUpdateHomeLoan($client);
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'numeric'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'unique:clients,email,' . $this->id . ',id', 'string', 'email', 'max:255', 'required_without:phone_number'],
            'phone_number' => ['nullable', 'string', 'max:255', 'required_without:email'],
            'cash_loan_amount' => ['nullable', 'numeric', 'between:0.00,999999.99'],
            'home_loan_value' => ['nullable', 'numeric', 'between:0.00,999999.99', 'required_with:home_loan_down_payment_amount'],
            'home_loan_down_payment_amount' => ['nullable', 'numeric', 'between:0.00,999999.99', 'required_with:home_loan_value'],
        ];
    }
}
