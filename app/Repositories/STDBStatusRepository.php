<?php

namespace App\Repositories;

use App\Models\STDBStatus;
use App\Repositories\BaseRepository;

/**
 * Class STDBStatusRepository
 * @package App\Repositories
 * @version December 10, 2021, 12:40 pm UTC
*/

class STDBStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc'
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
        return STDBStatus::class;
    }
}
