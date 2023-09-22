<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // if (auth('user')->check() && !auth('user')->user()->is_active) {
        //     auth('user')->logout();
        //     return redirect()->route('login')->with('error', 'Your account is temporarily blocked.');
        // }
        if (Auth::guard('user')->check() && !Auth::guard('user')->user()->is_active) {
            Auth::guard('user')->logout();
            return redirect()->route('login')->with('error', 'Your account is temporarily blocked.');
        }


        return $next($request);
    }
}
