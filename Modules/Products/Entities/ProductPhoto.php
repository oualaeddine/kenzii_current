<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProductPhoto
 * @package App\Models
 * @version June 6, 2021, 8:49 am UTC
 *
 * @property Product $product
 * @property integer $product_id
 * @property string $link
 */
class ProductPhoto extends Model
{

    use HasFactory;

    public $timestamps = false;
    public $table = 'product_photos';

    /*    const CREATED_AT = 'created_at';
       const UPDATED_AT = 'updated_at'; */


    /* protected $dates = ['deleted_at']; */


    public $fillable = [
        'product_id',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'link' => 'required|string|max:255'
    ];

    /**
     * @return BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function product_main()
    {
        return $this->hasOne(Product::class, 'main_pic_id');
    }

}
