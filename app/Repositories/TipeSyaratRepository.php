<?php

namespace App\Repositories;

use App\Models\TipeSyarat;
use App\Repositories\BaseRepository;

/**
 * Class TipeSyaratRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:11 am UTC
*/

class TipeSyaratRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return TipeSyarat::class;
    }
}
