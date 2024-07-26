<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 

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
     *
     * @return void
     */
    public function boot()
    {      
        View::composer('*', ProfileComposer::class);
        // view::composer('*',function($view){
        //     $view->with('name','suraj');
        // });
    }
}