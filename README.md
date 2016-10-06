# Inventory (Laravel 5 Package)

This package is under development. Please come back later.

- [Installation](#installation)

##Installation
In order to install Laravel 5 Entrust, just add

    "ryoyin/inventory": "dev-master"

to your composer.json. Then run `composer install` or `composer update`.

or you can run the `composer require` command from your terminal:
    
    composer require ryoyin/inventory dev-master
    
Then in your config/app.php add

    Ryoyin\Inventory\InventoryServiceProvider::class,
    
in the providers array, and then run
    
    composer dump-autoload

#Migration & Publish View
Run 

    php artisan migrate

It will install 3 tables to your database "items", "warehouse" and "warehouse_item" for a "many to many" situation.

To custom template, run

    php artisan vendor:publish
    
two view file will copy to your view directory

#Routing
inventory/item to access the CRUD item view

#How to use
Access Item model:

    use Ryoyin\Inventory;
    
    $inventory = new Inventory\Item; 
    