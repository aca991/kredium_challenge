@extends('forms.form')
@section('form-action'){{ $formAction }}@endsection
@section('form-method'){{ $formMethod }}@endsection
@section('form-fields')
    <h2>Login</h2>
    <input class="form-input" placeholder="Email" type="email" name="email" @if(!empty($oldEmail)) value="{{ $oldEmail }}" @endif/>
    <input class="form-input" type="password" placeholder="Password" name="password" />
    <button type="submit">Log In</button>
@endsection
