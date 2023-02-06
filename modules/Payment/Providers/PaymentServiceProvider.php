<?php

namespace ListaShop\Payment\Providers;

use Illuminate\Support\ServiceProvider;
use ListaShop\Payment\PaymentManager;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
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
        // $this->registerConfig();
    }

    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades()
    {
        /**
         * Bind to service container.
         */
        $this->app->bind('payment', function ($app) {
            return new PaymentManager($app);
        });
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/payment.php',
            'payment'
        );
    }
}
