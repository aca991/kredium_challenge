<?php

namespace App\Http\Requests;

use App\Http\Controllers\AdvisorController;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    protected $errorBag = AdvisorController::ERROR_BAG;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'unique:clients', 'string', 'email', 'max:255', 'required_without:phone_number'],
            'phone_number' => ['nullable', 'string', 'max:255', 'required_without:email'],
        ];
    }
}
