<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AdvisorController extends Controller
{
    const ERROR_BAG = 'advisor';

    public function dashboard(): View|Factory|Application
    {
        return view('advisor.dashboard',[
            'viewClientsRoute' => route('advisor.clients.list'),
            'viewReportRoute' => '',
        ]);
    }

    public function clients(): View|Factory|Application
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

    public function storeClient(StoreClientRequest $request): Application|Redirector|RedirectResponse
    {
        Client::updateOrCreate($request->validated());

        return redirect(route('advisor.clients.list'));

    }
}
