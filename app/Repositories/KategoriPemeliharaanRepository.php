<?php

namespace App\Repositories;

use App\Models\KategoriPemeliharaan;
use App\Repositories\BaseRepository;

/**
 * Class KategoriPemeliharaanRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:48 am UTC
*/

class KategoriPemeliharaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_pemeliharaan'
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
        return KategoriPemeliharaan::class;
    }
}
