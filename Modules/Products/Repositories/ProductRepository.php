<?php

namespace Modules\Products\Repositories;


use App\Repositories\BaseRepository;
use Modules\Products\Entities\Product;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version June 6, 2021, 8:49 am UTC
 */
class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'short_description',
        'long_description'
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
        return Product::class;
    }
}
