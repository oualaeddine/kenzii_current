<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Orders\Entities\Order;
use Modules\Products\Entities\Product;
use Modules\OldStoreFront\Entities\StoreProduct;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'tsrc', 'host', 'store_product_id'];


    public function order()
    {
        return $this->hasOne(Order::class, 'visitor_id');
    }


    public function store_product()
    {
        return $this->belongsTo(StoreProduct::class, 'store_product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
