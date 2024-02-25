<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('pages.supplier.supplierIndex');
    }

    public function store(Request $request){
        $supplier = $request->validate([
            'supplierName' => 'required|string|max:255|unique:'.Supplier::class,
            'supplierAddress' => 'required|string|max:255',
            'supplierContactNumber' => 'required|numeric|digits:11|unique:'.Supplier::class,
        ]);

        Supplier::create($supplier);

        return redirect(route('supplier'))->with('success','You have recorded a new supplier!');
    }
}
