<?php

namespace App\Repositories;

use App\Models\Pks;
use App\Repositories\BaseRepository;

/**
 * Class PksRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:37 am UTC
*/

class PksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_perusahaan',
        'mill_name',
        'group_perusahaan',
        'alamat_pabrik',
        'koordinat_x',
        'koordinat_y',
        'kapasitas_terpasang',
        'kapasitas_olah'
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
        return Pks::class;
    }
}
