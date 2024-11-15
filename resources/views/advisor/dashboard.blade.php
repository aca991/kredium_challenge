@extends('layouts.main')
@section('content')
    <div class="content-container dashboard-container">
        <a class="dashboard-link" href="{{ $viewClientsRoute }}">View Clients</a>
        <a class="dashboard-link" href="{{ $viewReportRoute }}">View Report</a>
        @include('header.logout-form')
    </div>
@overwrite
