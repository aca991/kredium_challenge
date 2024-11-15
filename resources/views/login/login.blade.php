@extends('layouts.main')
@section('content')
    @include('login.login-form', [
     'formAction' => $formAction,
     'formMethod' => $formMethod,
     'oldEmail' => $oldEmail,
     ])
@endsection
