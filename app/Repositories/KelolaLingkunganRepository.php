<?php

namespace App\Repositories;

use App\Models\KelolaLingkungan;
use App\Repositories\BaseRepository;

/**
 * Class KelolaLingkunganRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:40 am UTC
*/

class KelolaLingkunganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'persil_id',
        'petak_id',
        'nama_pekebun',
        'tgl_kelola',
        'kegiatan',
        'org_terlibat'
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
        return KelolaLingkungan::class;
    }
}
