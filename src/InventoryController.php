<?php

namespace Ryoyin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    private $inventory;

    function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function index()
    {
//        echo $this->inventory->sayHi();

        echo 123;
        exit;

        $item = Item::find(1)->first();

        $getWarehouse = $item->warehouses()->where('inventory_warehouse_id', 1)->first();
        $getWarehouse->pivot->quantity = 5;
        $getWarehouse->pivot->save();

    }

    public function store(Request $request)
    {
        //insert new item
        //id, name, description, quantity, category_id, status
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->category_id = $request->category_id == '' ? null:$request->category_id;
        $item->status = $request->status;
        $item->save();
    }
}
