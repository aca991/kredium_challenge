@extends('layouts.main')
@section('content')
    <div class="content-container">
        <h1>Create Client</h1>

        @include('advisor.client.client-form', [
         'formAction' => $formAction,
         'formMethod' => $formMethod,
         'errorBag' => $errorBag,
         ])
    </div>
@overwrite
