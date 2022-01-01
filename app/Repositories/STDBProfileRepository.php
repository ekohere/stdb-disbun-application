<?php

namespace App\Repositories;

use App\Models\STDBProfile;
use App\Repositories\BaseRepository;

/**
 * Class STDBProfileRepository
 * @package App\Repositories
 * @version December 10, 2021, 12:38 pm UTC
*/

class STDBProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'tempat_lahir',
        'tgl_lahir',
        'no_ktp',
        'alamat',
        'kecamatan',
        'desa',
        'jenis_kelamin',
        'status_dlm_keluarga',
        'jml_anggota_keluarga',
        'pendidikan_terakhir',
        'pekerjaan_lain'
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
        return STDBProfile::class;
    }
}
