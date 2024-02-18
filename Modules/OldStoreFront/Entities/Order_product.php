<?php

namespace Modules\OldStoreFront\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;
    protected $fillable=['product_id', 'quantity','price','order_id'];
}
