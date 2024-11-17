@extends('layouts.main')
@section('content')
    <div class="content-container">
        <h1>@if($isEdit) Update @else Create @endif Client</h1>
        <div class="button-container">
            <a class="button-primary" href="{{ $clientsListRoute }}">Go back to clients</a>
        </div>

        @include('client.client-form', [
         'formAction' => $formAction,
         'formMethod' => $formMethod,
         'errorBag' => $errorBag,
         'client' => $client ?? null,
         ])
    </div>
@overwrite
