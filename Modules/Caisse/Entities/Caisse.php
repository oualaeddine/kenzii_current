<?php

namespace Modules\Caisse\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Caisse extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['description','montant','date','type','user_id','person_id'];
    

    public static $rules = [
        'montant' => 'required|numeric|min:1',
        'description' => 'required|string',
        'date' => 'required|date',
        'type' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function person()
    {
        return $this->belongsTo(User::class,'person_id');
    }
    

}
