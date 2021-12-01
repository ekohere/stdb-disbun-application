<?php

namespace App\Repositories;

use App\Models\Anggota;
use App\Repositories\BaseRepository;

/**
 * Class AnggotaRepository
 * @package App\Repositories
 * @version November 30, 2021, 2:34 am UTC
*/

class AnggotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_anggota',
        'koperasi_id',
        'kode_koperasi',
        'nama_ktp',
        'nomor_ktp',
        'tempat_lahir',
        'tgl_lahir',
        'alamat_ktp',
        'alamat_desa_ktp',
        'alamat_kec_ktp',
        'jenis_kelamin',
        'status_dlm_keluarga',
        'jml_anggota_keluarga',
        'pendidikan_terakhir',
        'pekerjaan_lain',
        'lampiran_identitas',
        'lampiran_foto_anggota',
        'status_anggota'
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
        return Anggota::class;
    }
}
