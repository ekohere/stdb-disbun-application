<?php

namespace App\Repositories;

use App\Models\Resources;
use App\Repositories\BaseRepository;

/**
 * Class ResourcesRepository
 * @package App\Repositories
 * @version April 3, 2022, 6:22 am UTC
*/

class ResourcesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'package_id',
        'description',
        'format',
        'year'
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
        return Resources::class;
    }
}
