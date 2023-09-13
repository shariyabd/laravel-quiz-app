<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
  
    public function handle(Request $request, Closure $next , $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->guest('/admin/login');
        }
        return $next($request);
    }
}
