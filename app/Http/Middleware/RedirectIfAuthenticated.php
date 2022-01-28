<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $prefix = Route::getCurrentRoute()->getPrefix();
            return redirect(route("$prefix.index"));
        }

        return $next($request);
    }
}
