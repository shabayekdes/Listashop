<?php

namespace ListaShop\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Api route service provider
 *
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiV1Routes();

    }

    /**
     * Define the "api" version 1 routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiV1Routes()
    {
        $version = 'V1';
        
        Route::prefix("api/v1")
             ->middleware('api')
             ->namespace($this->getNamespace($version))
             ->group($this->getRoutPath($version));
    }

    /**
     * Get route path.
     *
     *
     * @return string
     */
    protected function getRoutPath($version)
    {
       return __DIR__ . "/../{$version}/Http/routes.php";
    }

    /**
     * Get namepace
     *
     *
     * @return string
     */
    protected function getNamespace($version)
    {
       return 'ListaShop\Api\\' . $version . '\\Http\Controllers';
    }
}
