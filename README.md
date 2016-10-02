"# inventory" 

1.Install via composer
composer require ryoyin/inventory dev-master

Or
edit composer.json
add "ryoyin/inventory": "dev-master" to require
add "Ryoyin\\Inventory\\":"vendor/ryoyin/inventory/src" to autoload > psr-4

2. Add "Ryoyin\Inventory\InventoryServiceProvider::class," to config\app.php