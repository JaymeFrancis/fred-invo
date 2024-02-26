<?php

namespace App\Http\Controllers;

use App\Models\AutoSupply;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index(){

        return view("pages.inventory.inventoryIndex");
    }

    public function create(){
        $suppliers = DB::table('suppliers')->pluck('supplierName', 'id');

        return view("livewire.pages.inventory.add-new-stocks", compact('suppliers'));
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
        return view("pages.inventory.viewContainer", compact('item'));

    }
}
