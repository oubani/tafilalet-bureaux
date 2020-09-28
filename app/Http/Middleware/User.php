<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
            return redirect()->route('admin');
        }
        //  2 = User
        if (Auth::user()->role == 0) {

            return $next($request);
        }
    }
}
