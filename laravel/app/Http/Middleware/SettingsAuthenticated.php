<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SettingsAuthenticated
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('settings')->check()) {
            return redirect(route("settings.customers.index"));
        }

        return $next($request);
    }
}
