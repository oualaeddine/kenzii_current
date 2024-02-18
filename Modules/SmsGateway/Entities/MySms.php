<?php


namespace Modules\SmsGateway\Entities;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MySms extends Model
{
    use HasFactory;

    protected $table = 'my_sms';

    protected $fillable = [
        'id',
        'order_id',
        'phone',
        'sms',
        'status',
    ];


}