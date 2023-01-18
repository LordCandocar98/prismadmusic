<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Auth;

use Closure;

class IsAdmin
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
        /** 
         * @var \App\Models\User $user 
        **/
        if (Auth::user()->role_id != 1) { 
            abort(401);
        }

        return $next($request);
    }
}