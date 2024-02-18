<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    
    use HasFactory;

    protected $fillable = ['phone','name','is_done'];

}
