<?php

namespace Admin\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Category service provider
 *
 */
class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //..
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admin');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
