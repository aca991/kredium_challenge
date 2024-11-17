<?php

namespace App\Http\Controllers;

use App\Services\Report\ExportCsvReportService;
use App\Services\Report\ReportDataService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    /**
     * @return View|Factory|Application
     */
    public function report(): View|Factory|Application
    {
        /** @var ReportDataService $reportDataService */
        $reportDataService = app(ReportDataService::class);
        return view('advisor.report',[
            'dashboardRoute' => route('advisor.dashboard'),
            'exportReportRoute' => route('advisor.report.export'),
            'reportProducts' => $reportDataService->generateReportData(),
        ]);
    }

    /**
     * @return BinaryFileResponse
     */
    public function exportReport(): BinaryFileResponse
    {
        /** @var ReportDataService $reportDataService */
        $reportDataService = app(ReportDataService::class);
        $reportProducts = $reportDataService->generateReportData();

        /** @var ExportCsvReportService $exportCsvReportService */
        $exportCsvReportService = app(ExportCsvReportService::class);
        $exportCsvReportService->export($reportProducts);

        return response()
            ->download($exportCsvReportService->getFilePath(), $exportCsvReportService->getFileName());
    }
}
