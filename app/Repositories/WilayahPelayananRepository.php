<?php

namespace App\Repositories;

use App\Models\WilayahPelayanan;
use App\Repositories\BaseRepository;

/**
 * Class WilayahPelayananRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:10 am UTC
*/

class WilayahPelayananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'wilayah_id',
        'pelayanan_id'
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
        return WilayahPelayanan::class;
    }
}
