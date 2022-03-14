<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('tiene_acceso', function ($user, $permiso) {              //PERMISO PARA CREAR MODERADORES
            return $permiso;
            //return $user->hasPermission('crear-mods');
        });*/
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    /*protected function guard()
    {
        return Auth::guard(app('VoyagerGuard')); //PERMISO PARA CREAR MODERADORES
    }*/
}
