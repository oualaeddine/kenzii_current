<?php

namespace Modules\OldStoreFront\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const RULES = [
        'name' => 'required|max:255',
        'phone' => 'required|max:18',
        'address' => 'required',
        'wilaya' => 'required|min:2',
        'price' => 'required',
        'quantity' => 'required',
        'product_id' => 'required',
    ];
    public $fillable = ['name', 'phone', 'address', 'wilaya'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    
}
