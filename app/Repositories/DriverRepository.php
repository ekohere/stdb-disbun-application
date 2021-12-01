<?php

namespace App\Repositories;

use App\Models\Driver;
use App\Repositories\BaseRepository;

/**
 * Class DriverRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:43 am UTC
*/

class DriverRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'kode_sopir',
        'nama_driver',
        'lampiran_sim',
        'hp',
        'alamat'
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
        return Driver::class;
    }
}
