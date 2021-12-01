<?php

namespace App\Repositories;

use App\Models\NeracaSimpanPinjam;
use App\Repositories\BaseRepository;

/**
 * Class NeracaSimpanPinjamRepository
 * @package App\Repositories
 * @version December 1, 2021, 3:37 am UTC
*/

class NeracaSimpanPinjamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_koperasi',
        'koperasi_id',
        'periode',
        'jml_kas',
        'piutang_tahun',
        'jml_piutang_tahun',
        'simpanan_pokok',
        'simpanan_wajib',
        'laba'
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
        return NeracaSimpanPinjam::class;
    }
}
