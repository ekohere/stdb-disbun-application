<?php

namespace App\Repositories;

use App\Models\PetaPersil;
use App\Repositories\BaseRepository;

/**
 * Class PetaPersilRepository
 * @package App\Repositories
 * @version November 30, 2021, 2:48 am UTC
*/

class PetaPersilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'judul',
        'file_geojson',
        'aktif'
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
        return PetaPersil::class;
    }
}
