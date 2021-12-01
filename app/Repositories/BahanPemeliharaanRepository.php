<?php

namespace App\Repositories;

use App\Models\BahanPemeliharaan;
use App\Repositories\BaseRepository;

/**
 * Class BahanPemeliharaanRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:49 am UTC
*/

class BahanPemeliharaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_bahan_pemeliharaan_id',
        'koperasi_id',
        'kode_koperasi',
        'nama_bahan',
        'satuan'
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
        return BahanPemeliharaan::class;
    }
}
