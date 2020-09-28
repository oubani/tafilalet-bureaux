<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        //  1 = Admin 
        if (Auth::user()->role == 1) {
            return $next($request);
        }
        //  2 = User
        if (Auth::user()->role == 0) {
            return redirect()->route('user');
        }
    }
}
