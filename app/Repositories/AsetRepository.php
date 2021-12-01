<?php

namespace App\Repositories;

use App\Models\Aset;
use App\Repositories\BaseRepository;

/**
 * Class AsetRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:40 am UTC
*/

class AsetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'koperasi_id',
        'kode_koperasi',
        'nomor',
        'nama',
        'tahun',
        'nilai_awal',
        'nilai_akhir',
        'kondisi',
        'foto',
        'pemakai',
        'keterangan'
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
        return Aset::class;
    }
}
