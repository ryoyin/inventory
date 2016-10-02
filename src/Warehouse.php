<?php

namespace Ryoyin\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $table = "inventory_warehouses";
    protected $dates = ['deleted_at'];

    public function items()
    {
        return $this->belongsToMany('Ryoyin\Inventory\Item', 'inventory_warehouse_item', 'inventory_warehouse_id', 'inventory_item_id')->withPivot('quantity');
    }
}