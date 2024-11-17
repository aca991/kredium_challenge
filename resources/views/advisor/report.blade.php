@extends('layouts.main')
@section('content')
    <div class="content-container">
        <h1>Report</h1>
        <div class="button-container">
            <a class="button-primary" href="{{ $dashboardRoute }}">Go back to dashboard</a>
            <a class="button-primary" href="{{ $exportReportRoute }}">Export to csv</a>
        </div>
        @if(empty($reportProducts))
            No products for currently logged in advisor.
        @else
            <table class="entity-list">
                <thead>
                <tr>
                    <th>Product type</th>
                    <th>Product value</th>
                    <th>Creation date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reportProducts as $product)
                    <tr>
                        <td>{{ $product->getType() }}</td>
                        <td>{{ $product->getProductValue() }}</td>
                        <td>{{ $product->getCreatedAt() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@overwrite
