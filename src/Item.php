<?php

namespace Ryoyin\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = "inventory_items";
    protected $dates = ['deleted_at'];

    public function warehouses()
    {
        return $this->belongsToMany('Ryoyin\Inventory\Warehouse', 'inventory_warehouse_item', 'inventory_item_id', 'inventory_warehouse_id')->withPivot('quantity');;
    }
}