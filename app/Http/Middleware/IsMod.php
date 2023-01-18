<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Auth;

use Closure;

 //dd(Auth::user()->role_id);

class IsMod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** 
         * @var \App\Models\User $user 
        **/
        if (Auth::user()->role_id == 2) { //1 admin, 2 user y 3 mod
            return redirect()->to('admin');
        }

        return $next($request);
    }
}