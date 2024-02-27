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
        
        
        if($request->supplierType == 'new'){
            
            // dd($request->supplierType);
            // dd($newSupplier);
            $validated = $request->validate([
                'itemName' => 'required|string|max:255|unique:'.AutoSupply::class,
                'itemQuantity' => 'required|numeric',
                'unitPrice' => 'required|numeric',
                'supplierName' => 'required|string|max:255|unique:'.Supplier::class,
                'supplierAddress' => 'required|string|max:255',
                'supplierContactNumber' => 'required|numeric|digits:11|unique:'.Supplier::class,
            ]);

            $newSupplier = new Supplier();
            $newSupplier->supplierName = $validated['supplierName'];
            $newSupplier->supplierAddress = $validated['supplierAddress'];
            $newSupplier->supplierContactNumber = $validated['supplierContactNumber'];
            $newSupplier->save();
            $newSupplier->id;


        }elseif($request->supplierType == 'existing'){
            dd($request->supplierType);
            $validated = $request->validate([
                'itemName' => 'required|string|max:255|unique:'.AutoSupply::class,
                'itemQuantity' => 'required|numeric',
                'unitPrice' => 'required|numeric',
                'supplierId' => 'required|numeric',
            ]);
        }

        

        
        // AutoSupply::create($items);

        return redirect(route('inventory'))->with("success", "You have added a new stock!");
    }

    public function edit($id){
        
        $item = AutoSupply::where('id', $id)->firstOrFail();
        return view("pages.inventory.viewContainer", compact('item'));

    }
}
