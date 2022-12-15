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

        Gate::define('isConcessionario', function($user){
            return $user->hasLivello('concessionario');
        });

        Gate::define('isCliente',function($user){
            return $user->hasLivello('cliente');
        });


        Gate::define('isFornitore', function($user){
            return $user->hasLivello('fornitore');
        });

        //questa probabilmente non la uso ma per ora la lascio
        Gate::define('isLoggato',function($user){
            return isset($user);
        });

    }
}
