<?php

namespace Modules\Categories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\OldStoreFront\Entities\StoreProduct;

class StoreCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','store_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



    public function store_product()
    {
        return $this->belongsToMany(StoreProduct::class, 'store_product_categories', 'store_category_id', 'store_product_id')
                    ->withPivot('id')
                    ->withTimestamps();
    }

}
