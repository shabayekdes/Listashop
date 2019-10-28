<?php

namespace Cart\Providers;

use Illuminate\Support\ServiceProvider;


class CartServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
    }

    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades()
    {

    }
}