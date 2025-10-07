<?php

namespace App\Http\Controllers\Settings\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('settings.auth.index');
    }

    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::guard('settings')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('settings.home'));
        }

        return back()->withErrors([
            'error' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if (!Auth::guard('settings')->check()) {
            return redirect()->route('settings.login');
        }
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('settings.login'));
    }
}
