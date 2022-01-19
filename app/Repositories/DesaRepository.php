<?php

namespace App\Repositories;

use App\Models\Desa;
use App\Repositories\BaseRepository;

/**
 * Class DesaRepository
 * @package App\Repositories
 * @version January 17, 2022, 3:05 am UTC
*/

class DesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_kec',
        'kode_desa',
        'nama_desa'
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
        return Desa::class;
    }
}
