<?php

namespace Modules\Orders\Repositories;

use App\Repositories\BaseRepository;
use Modules\Orders\Entities\Order;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version June 6, 2021, 9:57 am UTC
 */
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'yal_tracking',
        'name',
        'phone',
        'address',
        'wilaya',
        'id_mairie',
        'discount',
        'delivery_price',
        'comments',
        'last_status'
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
        return Order::class;
    }
}
