<?php

namespace App\Http\Middleware;

use Auth;
use JWTAuth;
use Closure;

class APIMiddleware
{
    public function handle($request, Closure $next) {
        try {
            $jwt = JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            $jwt = false;
        }

        return (Auth::check() || $jwt) ? $next($request) : response('Unauthorized.', 401);
    }
}
