<?php

namespace ListaShop\Value\Providers;

use Illuminate\Support\ServiceProvider;

class ValueServiceProvider extends ServiceProvider
{
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
