<?php

namespace App\Repositories;

use App\Models\Koperasi;
use App\Repositories\BaseRepository;

/**
 * Class KoperasiRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:57 am UTC
*/

class KoperasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_kec',
        'kode_koperasi',
        'nama_koperasi',
        'alamat',
        'telepon'
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
        return Koperasi::class;
    }
}
