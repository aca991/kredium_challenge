<?php

namespace App\Http\Controllers;

use App\Services\Report\ReportDataService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdvisorController extends Controller
{
    /**
     * @return View|Factory|Application
     */
    public function dashboard(): View|Factory|Application
    {
        return view('advisor.dashboard',[
            'viewClientsRoute' => route('client.list'),
            'viewReportRoute' => route('advisor.report'),
        ]);
    }

    public function report(): View|Factory|Application
    {
        /** @var ReportDataService $reportDataService */
        $reportDataService = app(ReportDataService::class);
        return view('advisor.report',[
            'dashboardRoute' => route('advisor.dashboard'),
            'reportProducts' => $reportDataService->generateReportData(),
        ]);
    }
}
