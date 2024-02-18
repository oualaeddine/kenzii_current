<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BonAchat
 * @package App\Models
 * @version June 6, 2021, 8:49 am UTC
 *
 * @property Product $product
 * @property integer $product_id
 * @property integer $quantity
 * @property number $unit_price
 * @property string $seller
 */
class BonAchat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bons_achats';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',
        'quantity',
        'unit_price',
        'seller'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'integer',
        'unit_price' => 'float',
        'seller' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'seller' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
