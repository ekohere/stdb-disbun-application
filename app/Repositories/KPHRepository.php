<?php

namespace App\Repositories;

use App\Models\KPH;
use App\Repositories\BaseRepository;

/**
 * Class KPHRepository
 * @package App\Repositories
 * @version February 3, 2022, 8:44 am UTC
*/

class KPHRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'unit_kph',
        'polygon_id'
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
        return KPH::class;
    }
}
