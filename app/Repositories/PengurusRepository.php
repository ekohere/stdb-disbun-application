<?php

namespace App\Repositories;

use App\Models\Pengurus;
use App\Repositories\BaseRepository;

/**
 * Class PengurusRepository
 * @package App\Repositories
 * @version November 30, 2021, 5:36 am UTC
*/

class PengurusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'nama',
        'golongan',
        'jabatan',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'tgl_masuk',
        'tgl_keluar',
        'status_kawin',
        'status'
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
        return Pengurus::class;
    }
}
