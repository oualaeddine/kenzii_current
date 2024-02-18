<?php

namespace Modules\Stores\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store_setting extends Model
{
    use HasFactory;

    protected $fillable = ['type','name','value','priorty','group'];
    
  
}
