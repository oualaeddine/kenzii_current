<?php

namespace Modules\Stores\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Categories\Entities\Category;
use Modules\Orders\Entities\Order;
use Modules\Products\Entities\Product;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'privacy',
        'terms',
        'fb_pixel',
        'google_analytics',
        'discount',
        'fb',
        'access_token'
    ];


    public static $rules = [

    ];

    public function orders()
    {
        return $this->hasOne(Order::class, 'store_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'store_products', 'store_id', 'product_id')
            ->withPivot('price')
            ->withPivot('visible')
            ->withPivot('featured')
            ->withPivot('new')
            ->withPivot('price_txt')
            ->withPivot('price_old')
            ->withPivot('discount')
            ->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'store_categories', 'store_id', 'category_id')
                    ->withPivot('id')
                    ->withTimestamps();
    }
}
