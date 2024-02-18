<?php

namespace Modules\Products\Repositories;


use App\Repositories\BaseRepository;
use Modules\Products\Entities\BonAchat;

/**
 * Class BonAchatRepository
 * @package App\Repositories
 * @version June 6, 2021, 8:49 am UTC
 */
class BonAchatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_id',
        'quantity',
        'unit_price',
        'seller'
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
        return BonAchat::class;
    }
}
