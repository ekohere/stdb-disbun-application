<?php

namespace App\Repositories;

use App\Models\Wilayah;
use App\Repositories\BaseRepository;

/**
 * Class WilayahRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:09 am UTC
*/

class WilayahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'information'
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
        return Wilayah::class;
    }
}
