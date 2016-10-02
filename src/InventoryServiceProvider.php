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
//        echo 123;
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
        $this->app->make('Ryoyin\Inventory\Inventory');
    }
}
