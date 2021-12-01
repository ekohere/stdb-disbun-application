<?php

namespace App\Repositories;

use App\Models\GajiKaryawan;
use App\Repositories\BaseRepository;

/**
 * Class GajiKaryawanRepository
 * @package App\Repositories
 * @version December 1, 2021, 3:27 am UTC
*/

class GajiKaryawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'periode_bulan',
        'periode_tahun',
        'karyawan_id',
        'gaji_pokok',
        'tj_jabatan',
        'tj_konsumsi',
        'tj_harian',
        'bonus_target_lembur',
        'potongan_pph_21',
        'potongan_asuransi',
        'potongan_bulan_lalu'
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
        return GajiKaryawan::class;
    }
}
