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

        $item = Item::find(1)->first();
//        $warehouse = Warehouse::find(1)->first();
//        dd($warehouse);
//        $item->warehouses()->attach($warehouse->id, ['quantity' => 0]);

        foreach ($item->warehouses as $warehouse) {
            echo 'name: '.$warehouse->name;
            echo '<br>';
            echo 'quantity: '.$warehouse->pivot->quantity;
        }

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
