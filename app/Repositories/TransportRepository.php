<?php

namespace App\Repositories;

use App\Models\Transport;
use App\Repositories\BaseRepository;

/**
 * Class TransportRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:41 am UTC
*/

class TransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'nama_pemilik',
        'alamat_pemilik',
        'kapasitas',
        'nomor_plat',
        'kode_transport',
        'lampiran_stnk',
        'lampiran_lainnya',
        'ket'
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
        return Transport::class;
    }
}
