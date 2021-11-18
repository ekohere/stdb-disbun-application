<?php

namespace App\Repositories;

use App\Models\JenisPelayanan;
use App\Repositories\BaseRepository;

/**
 * Class JenisPelayananRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:10 am UTC
*/

class JenisPelayananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return JenisPelayanan::class;
    }
}
