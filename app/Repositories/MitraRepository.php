<?php

namespace App\Repositories;

use App\Models\Mitra;
use App\Repositories\BaseRepository;

/**
 * Class MitraRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:38 am UTC
*/

class MitraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'nomor_mitra',
        'nama_mitra',
        'jenis',
        'alamat',
        'kontak',
        'email',
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
        return Mitra::class;
    }
}
