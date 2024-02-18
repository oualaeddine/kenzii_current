<?php

namespace Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Entities\Product;

/**
 * Class OrderProduct
 * @package App\Models
 * @version June 6, 2021, 10:02 am UTC
 *
 * @property Order $order
 * @property Product $product
 * @property integer $product_id
 * @property integer $order_id
 * @property integer $quantity
 * @property number $price
 */
class OrderProduct extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'order_id' => 'integer',
        'quantity' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'order_id' => 'required',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * @return BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
