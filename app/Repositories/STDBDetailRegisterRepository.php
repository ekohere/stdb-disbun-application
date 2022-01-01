<?php

namespace App\Repositories;

use App\Models\STDBDetailRegister;
use App\Repositories\BaseRepository;

/**
 * Class STDBDetailRegisterRepository
 * @package App\Repositories
 * @version December 10, 2021, 1:27 pm UTC
*/

class STDBDetailRegisterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stdb_register_id',
        'stdb_persil_id',
        'persil_id'
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
        return STDBDetailRegister::class;
    }
}
