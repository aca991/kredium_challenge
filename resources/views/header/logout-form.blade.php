@extends('forms.form')
@section('form-action'){{ route('logout') }}@overwrite
@section('form-method'){{ 'POST' }}@overwrite
@section('form-container-additional-classes')
    {{ 'logout-form' }}
@overwrite
@section('form-fields')
    @include('forms.fields.form-field-button', [
      'label' => 'Log Out',
  ])
@overwrite
