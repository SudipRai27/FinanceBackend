<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class restrictLogin
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
        if(Auth::check())
        {
            //user is logged in
            Session::flash('error-msg', 'You are already logged in');
            return redirect()->route('superadmin-home');
        }
        return $next($request);
    }
}
