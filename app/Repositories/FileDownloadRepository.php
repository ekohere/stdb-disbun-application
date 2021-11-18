<?php

namespace App\Repositories;

use App\Models\FileDownload;
use App\Repositories\BaseRepository;

/**
 * Class FileDownloadRepository
 * @package App\Repositories
 * @version August 28, 2021, 3:11 am UTC
*/

class FileDownloadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'information',
        'slug'
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
        return FileDownload::class;
    }
}
