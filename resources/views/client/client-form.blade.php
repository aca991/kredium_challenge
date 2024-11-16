@extends('forms.form')
@section('form-action'){{ $formAction }}@overwrite
@section('form-method'){{ 'POST' }}@overwrite
@section('form-fields')
    @if(!empty($client))
        @include('forms.fields.form-field-input', [
          'type' => 'hidden',
          'name' => 'id',
          'value' => $client->id,
      ])
    @endif

    @include('forms.fields.form-field-input', [
       'placeholder' => 'First name',
       'type' => 'text',
       'name' => 'first_name',
       'errorBag' => $errorBag,
       'value' => !empty($client) ? $client->first_name : '',
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Last name',
       'type' => 'text',
       'name' => 'last_name',
       'errorBag' => $errorBag,
       'value' => !empty($client) ? $client->last_name : '',
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Email',
       'type' => 'email',
       'name' => 'email',
       'errorBag' => $errorBag,
       'value' => !empty($client) ? $client->email : '',
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Phone number',
       'type' => 'text',
       'name' => 'phone_number',
       'errorBag' => $errorBag,
       'value' => !empty($client) ? $client->phone_number : '',
   ])

    @include('forms.fields.form-field-button', [
       'label' => 'Save Client',
   ])
@overwrite
