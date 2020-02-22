<?php

namespace Shop\Providers;

use Category\Models\Category;
use Illuminate\Support\ServiceProvider;

/**
 * Shop service provider
 *
 */
class ShopServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'shop');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->composeView();

    }
    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php', 'menu.shop'
        );
    }

    /**
     * Bind the the data to the views
     *
     * @return void
     */
    protected function composeView()
    {
        view()->composer(['shop::layouts.header.*','shop::category.*','shop::home'], function ($view) {
            $categories = Category::all();

            $view->with('categories', $categories);
        });
    }

}
