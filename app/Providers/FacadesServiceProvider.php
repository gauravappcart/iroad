<?php

namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('user',function() {
            return new \App\GlobalFacades\UserFacades;
         });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
