<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\Caisse\Entities\Caisse;
use Modules\Charges\Entities\Charge;
use Modules\Orders\Entities\Order;
use Modules\Payments\Entities\Payment;
use Spatie\Permission\Traits\HasRoles;
//use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable //implements JWTSubject
{
    use HasFactory, HasApiTokens,Notifiable;
    use HasRoles,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'username',
        'email',
        'is_active',
        'device_token'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class,'assign_orders',
        'user_id','order_id')
            ->withPivot(['id'])
            ->withTimestamps();
    }

    public function charges()
    {
        return $this->hasMany(Charge::class,'add_by');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'add_by');
    }

    public function caisses()
    {
        return $this->hasMany(Caisse::class,'user_id');
    }

    public function person_operations()
    {
        return $this->hasMany(Caisse::class,'person_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

     

}
