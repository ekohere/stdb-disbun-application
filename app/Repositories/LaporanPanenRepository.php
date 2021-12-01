<?php

namespace App\Repositories;

use App\Models\LaporanPanen;
use App\Repositories\BaseRepository;

/**
 * Class LaporanPanenRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:38 am UTC
*/

class LaporanPanenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'persil_id',
        'pekerja_id',
        'kode_panen',
        'nomor_persil',
        'tgl_panen',
        'luas',
        'rotasi',
        'hk',
        'jml_jjg',
        'berat_brondol',
        'berat_kirim',
        'keterangan'
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
        return LaporanPanen::class;
    }
}
