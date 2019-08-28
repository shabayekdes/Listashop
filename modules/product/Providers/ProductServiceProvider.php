<?php

namespace Product\Providers;

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

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Product\Repositories\ProductRepositoryInterface',
            'Product\Repositories\ProductRepository'
        );
    }
}
