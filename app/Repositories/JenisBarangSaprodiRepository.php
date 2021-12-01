<?php

namespace App\Repositories;

use App\Models\JenisBarangSaprodi;
use App\Repositories\BaseRepository;

/**
 * Class JenisBarangSaprodiRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:46 am UTC
*/

class JenisBarangSaprodiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_jenis_barang_saprodi',
        'jenis_barang_saprodi'
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
        return JenisBarangSaprodi::class;
    }
}
