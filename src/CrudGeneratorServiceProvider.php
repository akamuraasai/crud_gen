<?php

namespace AkamuraAsai\CrudGen;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'crudgen');
        $this->publishes([
            __DIR__.'/public' => public_path('crudgen'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('AkamuraAsai\CrudGen\Controllers\CrudGenController');
    }
}
