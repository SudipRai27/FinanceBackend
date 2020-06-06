<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class customAuthCheck
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

        if (!Auth::check()) 
        {
            // The user is not logged in...
            Session::flash('error-msg', 'Please login first');
            return redirect()->route('superadmin-login');
        }
     

        return $next($request);
    }
}
