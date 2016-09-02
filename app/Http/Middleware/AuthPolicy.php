<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class AuthPolicy
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
        if (Auth::user()->session_id != Session::getId())
        {
            Auth::logout();
            return redirect()->guest('/login');
        }

        return $next($request);
    }
}
