<?php

namespace App\Repositories;

use App\Models\ItemPilihan;
use App\Repositories\BaseRepository;

/**
 * Class ItemPilihanRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:18 am UTC
*/

class ItemPilihanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'information',
        'syarat_pelayanan_id'
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
        return ItemPilihan::class;
    }
}
