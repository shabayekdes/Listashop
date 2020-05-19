<?php

namespace Payment\Providers;

use Illuminate\Support\ServiceProvider;
use Payment\PaymentManager;

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
    }

    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades()
    {
        $this->app->singleton('payment', function () {
            return new PaymentManager();
        });
    }

}
