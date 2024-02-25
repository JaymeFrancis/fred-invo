<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');
Route::middleware(['auth', 'verified'])->group(function (){
    Route::view('dashboard', 'pages.dashboard')
    ->name('dashboard');
    
    Route::get("/joborder", [JobOrderController::class, "index"])->name('joborder');

    
    Route::prefix('inventory')->group(function (){
        Route::get("/", [InventoryController::class, "index"])->name('inventory');
        Route::post('/store', [InventoryController::class, "store"])->name('store-item');
        Route::get('/{id}/view', [InventoryController::class, "edit"])->name('view-item');
    });

    Route::prefix('supplier')->group(function (){
        Route::get('/', [SupplierController::class, 'index'])->name('supplier');
        Route::post('/store', [SupplierController::class, 'store'])->name('store-supplier');
    });

    Route::view('reports', 'pages.reports')
    ->name('reports');

    Route::view('utilities', 'pages.utilities')
    ->name('utilities');

    Route::view('profile', 'pages.profile')
    ->name('profile');
});


require __DIR__.'/auth.php';
