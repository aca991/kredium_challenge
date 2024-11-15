@extends('forms.form')
@section('form-action'){{ $formAction }}@overwrite
@section('form-method'){{ 'POST' }}@overwrite
@section('form-fields')
    @include('forms.fields.form-field-input', [
       'placeholder' => 'First name',
       'type' => 'text',
       'name' => 'first_name',
       'errorBag' => $errorBag,
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Last name',
       'type' => 'text',
       'name' => 'last_name',
       'errorBag' => $errorBag,
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Email',
       'type' => 'email',
       'name' => 'email',
       'errorBag' => $errorBag,
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Phone number',
       'type' => 'text',
       'name' => 'phone_number',
       'errorBag' => $errorBag,
   ])

    @include('forms.fields.form-field-button', [
       'label' => 'Save Client',
   ])
@overwrite
