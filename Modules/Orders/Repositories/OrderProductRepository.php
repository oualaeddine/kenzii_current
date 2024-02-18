<?php

namespace Modules\Orders\Repositories;

use App\Repositories\BaseRepository;
use Modules\Orders\Entities\OrderProduct;

/**
 * Class OrderProductRepository
 * @package App\Repositories
 * @version June 6, 2021, 10:02 am UTC
 */
class OrderProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
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
        return OrderProduct::class;
    }
}
