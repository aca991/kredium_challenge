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

    /**
     * @return Factory|Application|View|RedirectResponse
     */
    public function login(): Factory|Application|View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('advisor.dashboard');
        }

        return view('login.login', [
            'formAction' => route('authenticate'),
            'formMethod' => 'POST',
            'oldEmail' => old('email'),
            'errorBag' => self::ERROR_BAG,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * @param AuthenticateRequest $request
     *
     * @return RedirectResponse
     */
    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ], self::ERROR_BAG)->onlyInput('email');
    }
}
