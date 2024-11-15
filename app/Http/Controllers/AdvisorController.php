<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdvisorController extends Controller
{
    const ERROR_BAG = 'advisor';

    public function dashboard()
    {
        return view('advisor.dashboard');
    }

    public function clients()
    {
        return view('advisor.client.clients');
    }

    public function createClient(): View|Factory|Application
    {
        return view('advisor.client.create-client', [
            'formAction' => route('advisor.client.store'),
            'formMethod' => 'POST',
            'errorBag' => self::ERROR_BAG,
        ]);
    }

    public function storeClient(StoreClientRequest $request)
    {
        Client::updateOrCreate($request->validated());

        return redirect(route('advisor.clients.list'));

    }
}
