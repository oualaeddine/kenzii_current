<?php

namespace Modules\OldStoreFront\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
        'fb'
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


}
