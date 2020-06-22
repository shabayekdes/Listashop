<?php

namespace ListaShop\Setting\Providers;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'settings');

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
