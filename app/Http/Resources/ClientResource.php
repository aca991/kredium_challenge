<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Client $this */
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'cash_loan' => 'No', // TODO implement
            'home_loan' => 'No', // TODO implement
            'edit_route' => route('client.store', $this->id),
            'delete_route' => route('client.delete', $this->id),
        ];
    }
}
