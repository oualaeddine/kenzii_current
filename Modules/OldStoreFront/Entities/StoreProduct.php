<?php

namespace Modules\OldStoreFront\Entities;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Categories\Entities\StoreCategory;
use Modules\Products\Entities\Product;

/**
 * Class StoreProduct
 * @package App\Models
 * @version June 14, 2021, 8:05 am UTC
 *
 * @property Product $product
 * @property Store $store
 * @property integer $store_id
 * @property integer $product_id
 * @property number $price
 */
class StoreProduct extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'store_products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'store_id',
        'product_id',
        'price',
        'visible',
        'price_txt'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'store_id' => 'integer',
        'product_id' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'store_id' => 'required',
        'product_id' => 'required',
        'price' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->where('num','!=',null);
    }

    public function product_spec()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'store_product_id');
    }


    public function store_product_category()
    {
        return $this->belongsToMany(StoreCategory::class, 'store_product_categories', 'store_product_id', 'store_category_id')
                    ->withPivot('id')
                    ->withTimestamps();
    }
}
