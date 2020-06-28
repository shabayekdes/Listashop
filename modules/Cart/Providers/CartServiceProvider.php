<?php

namespace ListaShop\Cart\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use ListaShop\Cart\Cart;

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
        //to make the cart facade and bind the
        //alias to the class needed to be called.
        // $loader = AliasLoader::getInstance();

        // $loader->alias('cart', Cart::class);

        // $this->app->singleton('cart', function () {
        //     return new cart();
        // });

        $this->app->bind('cart', 'ListaShop\Cart\Cart');
    }
}
