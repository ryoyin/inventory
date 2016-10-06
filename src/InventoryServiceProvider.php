<?php

namespace Ryoyin\Inventory;

use Illuminate\Support\ServiceProvider;

class InventoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'inventory');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/views' => resource_path('views/vendor/inventory'),
            ], 'ryoyin-inventory');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Ryoyin\Inventory\InventoryController');
        $this->app->make('Ryoyin\Inventory\ItemController');
        $this->app->make('Ryoyin\Inventory\Inventory');
    }
}
