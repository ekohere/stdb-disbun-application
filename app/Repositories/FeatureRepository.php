<?php

namespace App\Repositories;

use App\Models\Feature;
use App\Repositories\BaseRepository;

/**
 * Class FeatureRepository
 * @package App\Repositories
 * @version November 30, 2021, 6:41 am UTC
*/

class FeatureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_feature',
        'description',
        'images'
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
        return Feature::class;
    }
}
