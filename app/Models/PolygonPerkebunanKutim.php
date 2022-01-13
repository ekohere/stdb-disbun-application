<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class PolygonPerkebunanKutim extends Model
{
    use PostgisTrait;
    protected $connection = 'pgsql';

    protected $table = 'rtrw_perkebunan_kutim';

    protected $postgisFields = [
        'geom'
    ];
    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 32650
        ]
    ];
}
