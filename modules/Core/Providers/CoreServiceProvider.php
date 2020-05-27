<?php

namespace ListaShop\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        include __DIR__ . '/../Http/helpers.php';
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
