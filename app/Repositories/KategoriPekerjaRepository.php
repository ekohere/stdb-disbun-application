<?php

namespace App\Repositories;

use App\Models\KategoriPekerja;
use App\Repositories\BaseRepository;

/**
 * Class KategoriPekerjaRepository
 * @package App\Repositories
 * @version December 1, 2021, 4:46 am UTC
*/

class KategoriPekerjaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kategori_pekerja'
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
        return KategoriPekerja::class;
    }
}
