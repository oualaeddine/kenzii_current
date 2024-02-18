<?php

namespace Modules\Products\Entities;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Orders\Entities\OrderProduct;

/**
 * Class Product
 * @package App\Models
 * @version June 6, 2021, 8:49 am UTC
 *
 * @property Collection $bonsAchats
 * @property Collection $productPhotos
 * @property string $name
 * @property string $short_description
 * @property string $long_description
 */
class Product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'short_description',
        'brand_id',
        'manufacturer',
        'sizes',
        'origin',
        'num',
        'long_description',
        'main_pic_id',
        'video_url',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'short_description' => 'string',
        'long_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:191',
        'short_description' => 'required|string|max:191',
        'long_description' => 'required|string',
        'brand_id' => 'nullable|string',
        'manufacturer' => 'nullable|string',
        'sizes' => 'nullable|string',
        'origin' => 'nullable|string',
        'num' => 'nullable|string|unique:products,num',
        'video_url' => 'nullable|max:65000',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'slug' => 'required|string|max:65000',
    ];

    /**
     * @return HasMany
     **/
    public function bonsAchats()
    {
        return $this->hasMany(BonAchat::class, 'product_id');
    }


    public function main_photo()
    {
        return $this->belongsTo(ProductPhoto::class, 'main_pic_id');
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * @return HasMany
     **/
    public function productPhotos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function orderProduct()
    {
        return $this->hasOne(OrderProduct::class, 'product_id');
    }

    public function stores()
    {
        return $this->belongsToMany(Product::class, 'store_products', 'product_id', 'store_id')
            ->withPivot('price')
            ->withPivot('visible')
            ->withPivot('featured')
            ->withPivot('url')
            ->withPivot('new')
            ->withPivot('price_txt')
            ->withPivot('price_old')
            ->withPivot('discount')
            ->withTimestamps();
    }
}
