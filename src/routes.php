<?php

Route::get('inventory', 'ryoyin\inventory\InventoryController@index');
Route::resource('inventory/item', 'ryoyin\inventory\ItemController', ['names' => [
    'index' => 'inventory.item.index'
]]);
