<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    public function handle($request, Closure $next, $rol)
    {
        if (!Auth::check() || Auth::user()->rol !== $rol) {
            return redirect()->route('home')->with('error', 'No tienes permisos para acceder.');
        }

        return $next($request);
    }
}
