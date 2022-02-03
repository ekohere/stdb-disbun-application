<?php

namespace App\Repositories;

use App\Models\KphHasKecamatan;
use App\Repositories\BaseRepository;

/**
 * Class KphHasKecamatanRepository
 * @package App\Repositories
 * @version February 3, 2022, 5:09 pm UTC
*/

class KphHasKecamatanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kecamatan_id'
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
        return KphHasKecamatan::class;
    }
}
