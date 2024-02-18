<?php

namespace Modules\StoreProductCategories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['store_category_id','store_product_id'];



    
   
}
