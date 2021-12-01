<?php

namespace App\Repositories;

use App\Models\PembelianBarang;
use App\Repositories\BaseRepository;

/**
 * Class PembelianBarangRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:46 am UTC
*/

class PembelianBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'jenis_barang_id',
        'tgl_order',
        'nomor_order',
        'nomor_invoice',
        'mata_uang',
        'file_invoice',
        'pemasok'
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
        return PembelianBarang::class;
    }
}
