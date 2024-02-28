<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $primarykey = 'id';
    protected $fillable = [
        'supplierName',
        'supplierAddress',
        'supplierContactNumber',
    ];

    public function items(){
        return $this->hasMany(AutoSupply::class, 'id');
    }
}
