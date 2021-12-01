<?php

namespace App\Repositories;

use App\Models\Harga;
use App\Repositories\BaseRepository;

/**
 * Class HargaRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:49 am UTC
*/

class HargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'bulan',
        'tahun',
        'harga3',
        'harga4',
        'harga5',
        'harga6',
        'harga7',
        'harga8',
        'harga9',
        'harga10',
        'keterangan',
        'nomor_sk_gub',
        'tgl_sk_gub',
        'file_sk_gub'
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
        return Harga::class;
    }
}
