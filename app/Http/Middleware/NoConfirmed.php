<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Supporert\Facades\Route;
use Illuminate\Http\Request;
use Closure;

class NoConfirmed
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
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
        if (Auth::user()) {
            if (Auth::user()->registro_confirmed == 1 && Auth::user()->role_id != 1 && Auth::user()->role_id != 3) {
                if (Auth::user()->registro_confirmed == 1) {
                    return $next($request);
                }
                if ($request->ajax()) {
                    return response('Completa tu registro.', 401);
                } else {
                    return redirect()->to('/login'); //***************************************** */
                }
            } else {
                if (Auth::user()->registro_confirmed == 0) {
                    return redirect('registro');
                }
            }

            return $next($request);
        } else {
            return redirect()->to('/login');
        }
    }
}
