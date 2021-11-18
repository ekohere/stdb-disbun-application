<?php

namespace App\Repositories;

use App\Models\Pelayanan;
use App\Repositories\BaseRepository;

/**
 * Class PelayananRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:09 am UTC
*/

class PelayananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'information',
        'jenis_pelayanan_id'
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
        return Pelayanan::class;
    }
}
