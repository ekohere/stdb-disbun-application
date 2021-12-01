<?php

namespace App\Repositories;

use App\Models\Karyawan;
use App\Repositories\BaseRepository;

/**
 * Class KaryawanRepository
 * @package App\Repositories
 * @version November 30, 2021, 2:49 am UTC
*/

class KaryawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'kategori_pekerja_id',
        'nama',
        'jabatan',
        'kategori_pekerja',
        'golongan_status',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'tgl_masuk',
        'tgl_keluar',
        'status_kawin',
        'jenis_kelamin',
        'status',
        'file_sk',
        'lampiran_lainnya',
        'riwayat_pekerjaan',
        'gaji_pokok',
        'tj_jabatan',
        'tj_konsumsi',
        'tj_harian',
        'bonus_target_lembur'
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
        return Karyawan::class;
    }
}
