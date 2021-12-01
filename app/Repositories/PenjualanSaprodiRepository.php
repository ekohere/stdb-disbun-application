<?php

namespace App\Repositories;

use App\Models\PenjualanSaprodi;
use App\Repositories\BaseRepository;

/**
 * Class PenjualanSaprodiRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:48 am UTC
*/

class PenjualanSaprodiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'kode_anggota',
        'anggota_id',
        'tanggal',
        'no_nota',
        'pembiayaan',
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
        return PenjualanSaprodi::class;
    }
}
