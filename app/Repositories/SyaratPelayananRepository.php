<?php

namespace App\Repositories;

use App\Models\SyaratPelayanan;
use App\Repositories\BaseRepository;

/**
 * Class SyaratPelayananRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:14 am UTC
*/

class SyaratPelayananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'tipe_syarat_id',
        'information',
        'required',
        'pelayanan_id',
        'file_download_id'
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
        return SyaratPelayanan::class;
    }
}
