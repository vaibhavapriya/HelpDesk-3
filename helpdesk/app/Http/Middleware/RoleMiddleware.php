<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(Auth::check() && Auth::user->role=== $role){
            return $next($request);
        }
        else{
            abort(304,'unauthorize');
        }
    }
}

// app/Http/Middleware/RedirectIfAuthenticated.php
//public function handle(Request $request, Closure $next, ...$guards)
// {
//     if (Auth::check()) {
//         return redirect('/dashboard'); // ← This is your current redirect
//     }

//     return $next($request);
// }
// public function handle(Request $request, Closure $next, ...$guards)
// {
//     $guard = $guards[0] ?? null;

//     if (Auth::guard($guard)->check()) {
//         return redirect('/home'); // Redirect wherever you prefer
//     }

//     return $next($request);
// }
