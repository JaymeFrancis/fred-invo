<?php

namespace App\Http\Controllers;

use App\Models\AutoSupply;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function test(){
        $test = AutoSupply::find(1);
        $dump = $test->supplier->supplierName;
        dd($dump);
    }

    public function index(){

        return view("pages.inventory.inventoryIndex");
    }

    public function create(){
        $suppliers = DB::table('suppliers')->pluck('supplierName', 'id');

        return view("livewire.pages.inventory.add-new-stocks", compact('suppliers'));
    }

    public function store(Request $request){
        
        dd($request);
        if($request->supplierType == 'new'){
            
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
            $supplierId = $newSupplier->id;

            AutoSupply::create([
                'itemName' => $validated['itemName'],
                'itemQuantity' => $validated['itemQuantity'],
                'unitPrice' => $validated['unitPrice'],
                'supplierId' => $supplierId,
            ]);

            $success = "You have added a new item and supplier";

        }elseif($request->supplierType == 'existing'){

            $validated = $request->validate([
                'itemName' => 'required|string|max:255|unique:'.AutoSupply::class,
                'itemQuantity' => 'required|numeric',
                'unitPrice' => 'required|numeric',
                'supplierId' => 'required|numeric',
            ]);


            $insertedItem = AutoSupply::create([
                'itemName' => $validated['itemName'],
                'itemQuantity' => $validated['itemQuantity'],
                'unitPrice' => $validated['unitPrice'],
                'supplierId' => $validated['supplierId'],
            ]);

            $lastInsertedItem = $insertedItem->supplier->supplierName;
            $success = "You have added a new item from ".$lastInsertedItem;
        }

        

        
        // AutoSupply::create($items);

        return redirect(route('inventory'))->with("success", $success);
    }

    public function edit($id){
        
        $item = AutoSupply::where('id', $id)->firstOrFail();
        return view("pages.inventory.viewContainer", compact('item'));

    }
}
