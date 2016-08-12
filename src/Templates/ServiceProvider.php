<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ##nomePagina##ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\##nomePagina##\I##nomePagina##Repository',
            'App\Repositories\##nomePagina##\##nomePagina##Repository'
        );    
    }
}
