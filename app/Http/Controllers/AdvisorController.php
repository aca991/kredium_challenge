<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdvisorController extends Controller
{
    public function dashboard(): View|Factory|Application
    {
        return view('advisor.dashboard',[
            'viewClientsRoute' => route('client.list'),
            'viewReportRoute' => '',
        ]);
    }
}
