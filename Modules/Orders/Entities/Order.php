<?php

namespace Modules\Orders\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Stores\Entities\Store;

/**
 * Class Order
 * @package App\Models
 * @version June 6, 2021, 9:57 am UTC
 *
 * @property Collection $orderProducts
 * @property string $yal_tracking
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $wilaya
 * @property integer $id_mairie
 * @property number $discount
 * @property number $delivery_price
 * @property string $comments
 * @property string $last_status
 */
class Order extends Model
{
    use Notifiable;
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

 
    protected $dates = ['deleted_at'];


    public $fillable = [
        'yal_tracking',
        'name',
        'phone',
        'store_id',
        'address',
        'wilaya',
        'id_mairie',
        'discount',
        'delivery_price',
        'comments',
        'last_status',
        'alert_date',
        'visitor_id',
        'shipping'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'yal_tracking' => 'string',
        'name' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'wilaya' => 'string',
        'id_mairie' => 'integer',
        'discount' => 'float',
        'delivery_price' => 'float',
        'comments' => 'string',
        'last_status' => 'string',
        'created_at' => "datetime:Y-m-d",
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'yal_tracking' => 'nullable|string|max:255',
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'wilaya' => 'nullable|string|max:255',
        'id_mairie' => 'nullable',
        'discount' => 'required|numeric',
        'delivery_price' => 'required|numeric',
        'comments' => 'nullable|string',
        'last_status' => 'required|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'assign_orders',
            'order_id', 'user_id')
            ->withPivot(['id'])
            ->withTimestamps();
    }


    public function assignedUser()
    {
        $users  = $this->users()->get();
        if (count($users)>0)
            return $users->first()->name;
        else return 'not assigned';
    }

    public function mairie()
    {
        return $this->belongsTo('App\Models\YalidineMairie', 'id_mairie');
    }


    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor', 'visitor_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function order_history()
    {
        return $this->hasMany(OrderHistory::class, 'order_id');
    }


    /**
     * Route notifications for the Slack channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }
}
