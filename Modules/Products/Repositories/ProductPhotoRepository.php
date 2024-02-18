<?php

namespace Modules\Products\Repositories;

use App\Repositories\BaseRepository;
use Modules\Products\Entities\ProductPhoto;

/**
 * Class ProductPhotoRepository
 * @package App\Repositories
 * @version June 6, 2021, 8:49 am UTC
 */
class ProductPhotoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'link'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductPhoto::class;
    }
}
