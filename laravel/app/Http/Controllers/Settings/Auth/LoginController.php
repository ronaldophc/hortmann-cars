<?php

namespace App\Http\Controllers\Settings\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('settings.auth.index');
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('setting')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.vehicles.index'));
        }

        return back()->withErrors([
            'error' => 'As credenciais fornecidas estão incorretas.',
        ])->onlyInput('email');
    }
}
