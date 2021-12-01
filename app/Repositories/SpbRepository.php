<?php

namespace App\Repositories;

use App\Models\Spb;
use App\Repositories\BaseRepository;

/**
 * Class SpbRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:50 am UTC
*/

class SpbRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'no_spb',
        'tgl_spb',
        'transport_id',
        'driver_id',
        'pks_tujuan',
        'penerima',
        'pengangkut',
        'pengirim',
        'jab_pengirim'
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
        return Spb::class;
    }
}
