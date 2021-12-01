<?php

namespace App\Repositories;

use App\Models\Pelatihan;
use App\Repositories\BaseRepository;

/**
 * Class PelatihanRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:44 am UTC
*/

class PelatihanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'topik',
        'tgl',
        'file_dok',
        'jml_peserta',
        'pelaksana'
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
        return Pelatihan::class;
    }
}
