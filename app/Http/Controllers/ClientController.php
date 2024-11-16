<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ClientController extends Controller
{
    const ERROR_BAG = 'client';

    public function clients(): View|Factory|Application
    {
        $clients = Client::all();

        return view('client.list', [
            'dashboardRoute' => route('advisor.dashboard'),
            'createClientRoute' => route('client.create'),
            'clients' => ClientResource::collection($clients)->resolve(),
        ]);
    }

    public function clientForm(Client $client = null): View|Factory|Application
    {
        // TODO display old data
        return view('client.create-form-page', [
            'formAction' => route('client.store'),
            'formMethod' => 'POST',
            'errorBag' => self::ERROR_BAG,
            'client' => $client,
        ]);
    }

    public function storeClient(StoreClientRequest $request): Application|Redirector|RedirectResponse
    {
        $client = Client::updateOrCreate(['id' => $request->get('id')], $request->except(['id']));

        if (empty($client)) {
            return redirect(route('client.list'))->with('error', 'Client not saved');
        }

        return redirect(route('client.list'))->with('success', 'Client saved successfully');

    }

    public function deleteClient(Client $client): Application|Redirector|RedirectResponse
    {
        if (!$client->delete()) {
            return redirect(route('client.list'))->with('error', 'Client not deleted');
        }

        return redirect(route('client.list'))->with('success', 'Client deleted successfully');
    }
}
