<?php

namespace Modules\Stores\Repositories;


use App\Repositories\BaseRepository;
use Modules\Stores\Entities\Store;

/**
 * Class StoreRepository
 * @package App\Repositories
 * @version June 6, 2021, 8:49 am UTC
 */
class StoreRepository extends BaseRepository
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
        return Store::class;
    }
}
