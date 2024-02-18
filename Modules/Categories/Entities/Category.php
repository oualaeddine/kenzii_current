<?php

namespace Modules\Categories\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','icon','image','desc'];
    
    
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_categories', 'category_id', 'store_id')
                    ->withPivot('id')
                    ->withTimestamps();
    }


    public static $rules = [
        'name'  => 'required|string|max:255|unique:categories,name',
        'desc'  => 'nullable|string|max:65000',
        'image' => 'nullable|file|max:2048|mimes:png,jpg',
        'icon'  =>  'nullable|file|max:2048|mimes:png,jpg',
    ];

   
}
