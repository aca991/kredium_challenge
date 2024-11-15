<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(): View|Factory|Application
    {
        return view('login.login', [
            'formAction' => route('authenticate'),
            'formMethod' => 'POST',
            'oldEmail' => old('email'),
        ]);
    }
    public function logout()
    {

    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {
        $email = $request->validated('email');
        $password = $request->validated('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
