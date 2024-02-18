<?php

namespace Modules\OldStoreFront\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function photos()
    {
        return $this->hasMany(Product_photo::class, 'product_id', 'id');
    }
    public function price()
    {
        return $this->hasOne(Store_product::class, 'product_id', 'id')->where('store_id','=',env('STORE_ID'));
    }
}
