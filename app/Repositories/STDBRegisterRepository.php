<?php

namespace App\Repositories;

use App\Models\STDBRegister;
use App\Repositories\BaseRepository;

/**
 * Class STDBRegisterRepository
 * @package App\Repositories
 * @version December 10, 2021, 1:27 pm UTC
*/

class STDBRegisterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'anggota_id'
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
        return STDBRegister::class;
    }
}
