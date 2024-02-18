<?php

namespace Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHistory extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','message','status'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
