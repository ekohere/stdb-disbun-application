<?php

namespace App\Repositories;

use App\Models\JenisBarang;
use App\Repositories\BaseRepository;

/**
 * Class JenisBarangRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:45 am UTC
*/

class JenisBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_jenis_barang',
        'jenis_barang'
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
        return JenisBarang::class;
    }
}
