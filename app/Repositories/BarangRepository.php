<?php

namespace App\Repositories;

use App\Models\Barang;
use App\Repositories\BaseRepository;

/**
 * Class BarangRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:45 am UTC
*/

class BarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'jenis_barang_id',
        'kode_barang',
        'nama_barang',
        'kode_jenis_barang',
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
        return Barang::class;
    }
}
