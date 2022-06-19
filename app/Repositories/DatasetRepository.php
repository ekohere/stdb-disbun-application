<?php

namespace App\Repositories;

use App\Models\Dataset;
use App\Repositories\BaseRepository;

/**
 * Class DatasetRepository
 * @package App\Repositories
 * @version April 3, 2022, 6:21 am UTC
*/

class DatasetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'owner_org_id',
        'org_name'
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
        return Dataset::class;
    }
}
