<?php

namespace App\Repositories;

use App\Models\PenjualanTbs;
use App\Repositories\BaseRepository;

/**
 * Class PenjualanTbsRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:51 am UTC
*/

class PenjualanTbsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'panen_id',
        'spb_id',
        'tgl_penjualan',
        'pot_susut',
        'pot_sortasi',
        'harga_tbs',
        'keterangan',
        'file_upload'
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
        return PenjualanTbs::class;
    }
}
