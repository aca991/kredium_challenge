@extends('forms.form')
@section('form-action'){{ $formAction }}@overwrite
@section('form-method'){{ $formMethod }}@overwrite
@section('form-fields')
    <h2>Login</h2>
    @include('forms.fields.form-field-input', [
        'placeholder' => 'Email',
        'type' => 'email',
        'name' => 'email',
        'errorBag' => $errorBag,
    ])

    @include('forms.fields.form-field-input', [
        'placeholder' => 'Password',
        'type' => 'password',
        'name' => 'password',
        'errorBag' => $errorBag,
    ])

    @include('forms.fields.form-field-button', [
        'label' => 'Log In',
    ])
@overwrite
