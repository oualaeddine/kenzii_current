<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Orders\Entities\Order;

/**
 * @property integer $id
 * @property integer $id_wilaya
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property YalidineWilaya $yalidineWilaya
 */
class YalidineMairie extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_wilaya', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yalidineWilaya()
    {
        return $this->belongsTo('App\Models\YalidineWilaya', 'id_wilaya');
    }

    public function orders()
    {
        return $this->hasOne(Order::class, 'id_mairie');
    }




}
