<?php

namespace Modules\SmsGateway\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sms_setting extends Model
{
    use HasFactory;

    protected $fillable = ['text','status','is_active'];
    
  
}
