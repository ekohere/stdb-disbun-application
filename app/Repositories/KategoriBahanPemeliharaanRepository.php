<?php

namespace App\Repositories;

use App\Models\KategoriBahanPemeliharaan;
use App\Repositories\BaseRepository;

/**
 * Class KategoriBahanPemeliharaanRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:47 am UTC
*/

class KategoriBahanPemeliharaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_bahan_pemeliharaan'
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
        return KategoriBahanPemeliharaan::class;
    }
}
