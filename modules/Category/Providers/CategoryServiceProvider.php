<?php

namespace ListaShop\Category\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Category service provider
 *
 */
class CategoryServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
