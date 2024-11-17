<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\CashLoan;
use App\Models\Client;
use App\Services\AuthorizationService;
use App\Services\ClientDataService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;

class ClientController extends Controller
{
    const ERROR_BAG = 'client';

    /**
     * @return View|Factory|Application
     */
    public function clients(): View|Factory|Application
    {
        $clients = Client::all();

        return view('client.list.list', [
            'dashboardRoute' => route('advisor.dashboard'),
            'createClientRoute' => route('client.create'),
            'clients' => $clients,
        ]);
    }

    /**
     * @return View|Factory|Application
     */
    public function createForm(): View|Factory|Application
    {
        return view('client.form.create-form-page', [
            'formAction' => route('client.store'),
            'formMethod' => 'POST',
            'errorBag' => self::ERROR_BAG,
            'clientsListRoute' => route('client.list'),
            'isEdit' => false,
            'canUpdateCashLoan' => true,
            'canUpdateHomeLoan' => true,
        ]);
    }

    /**
     * @param Client|null $client
     *
     * @return View|Factory|Application
     */
    public function editForm(Client $client = null): View|Factory|Application
    {
        /** @var AuthorizationService $authorizationService */
        $authorizationService = app(AuthorizationService::class);

        return view('client.form.create-form-page', [
            'formAction' => route('client.store'),
            'formMethod' => 'POST',
            'errorBag' => self::ERROR_BAG,
            'client' => $client,
            'clientsListRoute' => route('client.list'),
            'isEdit' => true,
            'canUpdateCashLoan' => $authorizationService->userCanUpdateCashLoan($client),
            'canUpdateHomeLoan' => $authorizationService->userCanUpdateHomeLoan($client),
        ]);
    }

    /**
     * @param StoreClientRequest $request
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function storeClient(StoreClientRequest $request): Application|Redirector|RedirectResponse
    {
        $client = Client::updateOrCreate(
            ['id' => $request->get('id')],
            $request->except(['id', 'cash_loan_amount', 'home_loan_value', 'home_loan_down_payment_amount'])
        );
        if (empty($client)) {
            return redirect(route('client.list'))->with('error', 'Client not saved');
        }

        /** @var ClientDataService $clientDataService */
        $clientDataService = app(ClientDataService::class);

        $cashLoanUpdated = $clientDataService->upsertCashLoan($client, $request->input('cash_loan_amount', null));
        if (!$cashLoanUpdated) {
            return redirect(route('client.list'))->with('error', 'Cash loan not saved');
        }

        $homeLoanUpdated = $clientDataService->upsertHomeLoan(
            $client,
            $request->input('home_loan_value', null),
            $request->input('home_loan_down_payment_amount', null)
        );
        if (empty($homeLoanUpdated)) {
            return redirect(route('client.list'))->with('error', 'Home loan not saved');
        }

        return redirect(route('client.list'))->with('success', 'Client saved successfully');
    }

    /**
     * @param Client $client
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function deleteClient(Client $client): Application|Redirector|RedirectResponse
    {
        if (!$client->delete()) {
            return redirect(route('client.list'))->with('error', 'Client not deleted');
        }

        return redirect(route('client.list'))->with('success', 'Client deleted successfully');
    }
}
