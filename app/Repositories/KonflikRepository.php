<?php

namespace App\Repositories;

use App\Models\Konflik;
use App\Repositories\BaseRepository;

/**
 * Class KonflikRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:40 am UTC
*/

class KonflikRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'persil_id',
        'tgl_konflik',
        'pihak_terlibat',
        'jenis_konflik',
        'deskripsi_singkat',
        'penyelesaian',
        'keterangan',
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
        return Konflik::class;
    }
}
