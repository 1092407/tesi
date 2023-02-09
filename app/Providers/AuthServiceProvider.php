<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * In questo metodo definiamo le regole di autorizzazione
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isCasaAuto', function($user){
            return $user->hasLivello('casaauto');
        });

        Gate::define('isCliente',function($user){
            return $user->hasLivello('cliente');
        });



        Gate::define('isLoggato',function($user){
            return isset($user);
        });

    }
}
