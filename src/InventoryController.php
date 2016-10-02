<?php

namespace Ryoyin\Inventory;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    private $inventory;

    function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function index()
    {
        echo $this->inventory->sayHi();
    }
}
