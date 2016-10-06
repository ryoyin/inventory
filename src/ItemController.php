<?php

namespace Ryoyin\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
//        dd(session('status'));

        $items = Item::all();

        $data = array(
          'items' => $items
        );

        return view('inventory::item.item', $data);
    }

    public function create(Request $request)
    {
        $data = array(
            'title' => 'Create new item',
            'action' => url('inventory/item'),
            'item' => array(
                'name' => $request->old('name'),
                'description' => $request->old('description'),
                'sku' => $request->old('sku'),
                'model_no' => $request->old('model_no'),
                'category_id' => $request->old('category_id'),
                'status' => $request->old('status')
            )
        );

        return view('inventory::item.form', $data);
    }

    public function store(Request $request)
    {
        //insert new item
        //id, name, description, quantity, category_id, status
        $item = new Item();

        $item->name = $request->name;
        $item->description = $request->description;
        $item->sku = $request->sku;
        $item->model_no = $request->model_no;
        $item->category_id = $request->category_id == '' ? null:$request->category_id;
        $item->status = $request->status;

        $item->save();

        return redirect()->route('inventory.item.index')->with('status', 'Item '.$item->name.' created');
    }

    public function edit($id, Request $request)
    {
        $data = array(
            'title' => 'Edit item',
            'action' => url('inventory/item/'.$id),
            'formMethod' => 'PUT'
        );

        $item = Item::where('id', $id)->first();

        $data['item'] = array(
            'name' => $item->name,
            'description' => $item->description,
            'sku' => $item->sku,
            'model_no' => $item->model_no,
            'category_id' => $item->category_id,
            'status' => $item->status
        );

        if($request->old('name') !== null) {
            $data['item'] = array(
                'name' => $request->old('name'),
                'description' => $request->old('description'),
                'sku' => $request->old('sku'),
                'model_no' => $request->old('model_no'),
                'category_id' => $request->old('category_id'),
                'status' => $request->old('status')
            );
        }

//        echo 123;

        return view('inventory::item.form', $data);
    }

    public function update($id, Request $request) {
        $item = Item::where('id', $id)->first();
        $itemName = $item->name;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->sku = $request->sku;
        $item->model_no = $request->model_no;
        $item->category_id = $request->category_id;
        $item->status = $request->status;
        $item->save();

        return redirect()->route('inventory.item.index')->with('status', 'Item '.$itemName.' updated');
    }

    public function destroy($id)
    {
        $item = Item::where('id', $id)->first();
        $itemName = $item->name;
        $item->delete();

        return redirect()->route('inventory.item.index')->with('status', 'Item '.$itemName.' deleted');
    }
}
