<?php

namespace Modules\Payments\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['employee','amount','add_by','date_due','pay_date'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'add_by');
    }

}
