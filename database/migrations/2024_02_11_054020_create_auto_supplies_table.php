<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auto_supplies', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('itemQuantity');
            $table->string('unitPrice');
            $table->unsignedBigInteger('supplierId');
            $table->timestamps();
            $table->foreign('supplierId')->references('id')->on('suppliers')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_supplies');
    }
};
