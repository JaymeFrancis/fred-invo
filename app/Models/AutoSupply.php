<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoSupply extends Model
{
    use HasFactory;

    protected $table = 'auto_supplies';
    protected $primarykey = 'id';
    protected $fillable = [
        'itemName',
        'itemQuantity',
        'unitPrice',
        'supplierId'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
