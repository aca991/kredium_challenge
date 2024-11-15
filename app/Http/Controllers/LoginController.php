<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    const ERROR_BAG = 'login';

    public function login(): Factory|Application|View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login.login', [
            'formAction' => route('authenticate'),
            'formMethod' => 'POST',
            'oldEmail' => old('email'),
            'errorBag' => self::ERROR_BAG,
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
        ], self::ERROR_BAG)->onlyInput('email');
    }
}
