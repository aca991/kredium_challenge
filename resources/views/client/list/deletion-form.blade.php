@extends('forms.form')
@section('form-action'){{ $formAction }}@overwrite
@section('form-method'){{ $formMethod }}@overwrite
@section('form-fields')
    @include('forms.fields.form-field-button', [
        'label' => 'Delete',
    ])
@overwrite
