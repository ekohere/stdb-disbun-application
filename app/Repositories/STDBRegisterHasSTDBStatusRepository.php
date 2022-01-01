<?php

namespace App\Repositories;

use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\BaseRepository;

/**
 * Class STDBRegisterHasSTDBStatusRepository
 * @package App\Repositories
 * @version December 10, 2021, 1:29 pm UTC
*/

class STDBRegisterHasSTDBStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stdb_status_id',
        'message'
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
        return STDBRegisterHasSTDBStatus::class;
    }
}
