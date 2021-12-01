<?php

namespace App\Repositories;

use App\Models\Pemeliharaan;
use App\Repositories\BaseRepository;

/**
 * Class PemeliharaanRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:43 am UTC
*/

class PemeliharaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'kode_persil',
        'persil_id',
        'kategori_pemeliharaan_id',
        'luas_lahan',
        'tgl_pelaksanaan',
        'jml_luas_dikerjakan',
        'rotasi',
        'hk',
        'nilai_pekerja',
        'jml_transport',
        'cara_aplikasi',
        'mengunakan_apd',
        'ket'
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
        return Pemeliharaan::class;
    }
}
