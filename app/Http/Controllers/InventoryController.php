<?php

namespace App\Http\Controllers;

use App\Models\AutoSupply;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(){

        $items = AutoSupply::all();
        return view("pages.inventory.inventoryIndex", ["items" => $items]);
    }

    public function store(Request $request){
        
        $items = $request->validate([
            'itemName' => 'required|string|max:255|unique:'.AutoSupply::class,
            'itemQuantity' => 'required|numeric',
            'unitPrice' => 'required|numeric',
        ]);

        AutoSupply::create($items);

        return redirect(route('inventory'))->with("success", "You have added a new stock!");
    }

    public function edit($id){
        
        $item = AutoSupply::where('id', $id)->firstOrFail();
        return view('pages.inventory.edit-item')->with('item', $item);

    }
}
