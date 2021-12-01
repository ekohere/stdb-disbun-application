<?php

namespace App\Repositories;

use App\Models\Kontrak;
use App\Repositories\BaseRepository;

/**
 * Class KontrakRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:44 am UTC
*/

class KontrakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'pks_id',
        'harga_id',
        'nomor_kontrak',
        'tgl_kontrak',
        'periode_kontrak',
        'volume',
        'harga_aktual',
        'file_kontrak'
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
        return Kontrak::class;
    }
}
