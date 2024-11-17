@extends('forms.form')
@section('form-action'){{ $formAction }}@overwrite
@section('form-method'){{ 'POST' }}@overwrite
@section('form-fields')
    @if(!empty($client) && !empty($client->id))
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
       'value' => !empty($client) && !empty($client->first_name) ? $client->first_name : (!empty(old('first_name')) ? old('first_name') : ''),
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Last name',
       'type' => 'text',
       'name' => 'last_name',
       'errorBag' => $errorBag,
       'value' => !empty($client) && !empty($client->last_name) ? $client->last_name :  (!empty(old('last_name')) ? old('last_name') : ''),
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Email',
       'type' => 'email',
       'name' => 'email',
       'errorBag' => $errorBag,
       'value' => !empty($client) && !empty($client->email) ? $client->email :  (!empty(old('email')) ? old('email') : ''),
   ])

    @include('forms.fields.form-field-input', [
       'placeholder' => 'Phone number',
       'type' => 'text',
       'name' => 'phone_number',
       'errorBag' => $errorBag,
       'value' => !empty($client) && !empty($client->phone_number) ? $client->phone_number :  (!empty(old('phone_number')) ? old('phone_number') : ''),
   ])

    @if($canUpdateCashLoan)
        <div class="form-section">
            <h3>Cash Loan</h3>

            @include('forms.fields.form-field-input', [
              'placeholder' => 'Cash loan amount',
              'type' => 'number',
              'step' => '0.01',
              'name' => 'cash_loan_amount',
              'errorBag' => $errorBag,
              'value' => !empty($client) && $client->cashLoan()->exists() ? $client->cashLoan->amount :  (!empty(old('cash_loan_amount')) ? old('cash_loan_amount') : ''),
          ])
        </div>
    @endif

    @if($canUpdateHomeLoan)
        <div class="form-section">
            <h3>Home Loan</h3>

            @include('forms.fields.form-field-input', [
              'placeholder' => 'Home loan value',
              'type' => 'number',
              'step' => '0.01',
              'name' => 'home_loan_value',
              'errorBag' => $errorBag,
              'value' => !empty($client) && $client->homeLoan()->exists() ? $client->homeLoan->value :  (!empty(old('home_loan_value')) ? old('home_loan_value') : ''),
          ])

            @include('forms.fields.form-field-input', [
             'placeholder' => 'Home loan down payment amount',
             'type' => 'number',
              'step' => '0.01',
             'name' => 'home_loan_down_payment_amount',
             'errorBag' => $errorBag,
             'value' => !empty($client) && $client->homeLoan()->exists() ? $client->homeLoan->down_payment_amount :  (!empty(old('home_loan_down_payment_amount')) ? old('home_loan_down_payment_amount') : ''),
         ])
        </div>
    @endif

    @include('forms.fields.form-field-button', [
       'label' => 'Save Client',
   ])
@overwrite
