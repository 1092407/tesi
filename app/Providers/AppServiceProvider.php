<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     * Lo usiamo per ridefinire la lunghezza delle stringhe della form che di default
     * non è sufficiente ad esempio a contenere i caratteri codificati associati ad uno username 
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
    }
}
