<?php

namespace ListaShop\Product\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../Database/Factories');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }
}
