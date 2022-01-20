<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Auth;

use Closure;

 //dd(Auth::user()->role_id);

class IsAdmin
{
    // protected $auth;

    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var \App\Models\User $user **/
        if (Auth::user()->role_id != 1) {
            return redirect('admin');
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->to('admin/login');
            }
        }

        return $next($request);
    }
}