<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

}
