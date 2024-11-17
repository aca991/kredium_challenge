<?php

namespace App\Http\Controllers;

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
        return view('advisor.report',[

        ]);
    }
}
