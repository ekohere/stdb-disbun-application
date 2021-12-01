<?php

namespace App\Repositories;

use App\Models\BarangSaprodi;
use App\Repositories\BaseRepository;

/**
 * Class BarangSaprodiRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:47 am UTC
*/

class BarangSaprodiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'jenis_barang_saprodi_id',
        'kode_jenis_barang_saprodi',
        'nama_saprodi',
        'satuan'
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
        return BarangSaprodi::class;
    }
}
