@extends('layouts.main')
@section('content')
    <div class="content-container">
        <h1>Clients</h1>
        <div class="button-container">
            <a class="button-primary" href="{{ $dashboardRoute }}">Go back to dashboard</a>
            <a class="button-primary" href="{{ $createClientRoute }}">Create client</a>
        </div>
        @if(empty($clients))
            No clients stored in the system.
        @else
            <table class="entity-list">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Cash loan</th>
                    <th>Home loan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client['first_name'] }}</td>
                        <td>{{ $client['last_name'] }}</td>
                        <td>{{ $client['email'] }}</td>
                        <td>{{ $client['phone_number'] }}</td>
                        <td>{{ $client['cash_loan'] }}</td>
                        <td>{{ $client['home_loan'] }}</td>
                        <td>
                            <a href="{{ $client['edit_route'] }}">Edit</a>
                            @include('client.deletion-form', ['formAction' => $client['delete_route'], 'formMethod' => 'POST'])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@overwrite
