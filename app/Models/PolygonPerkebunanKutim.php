<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class PolygonPerkebunanKutim extends Model
{
    use PostgisTrait;
    protected $connection = 'pgsql';

    protected $table = 'rtrw_perkebunan';

    protected $postgisFields = [
        'geom',
        'geom_cc_rtrw',
        'geom_cc_apl'
    ];
    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 32650
        ],
        'geom_cc_rtrw' => [
            'geomtype' => 'geometry',
            'srid' => 32650
        ],
        'geom_cc_apl' => [
            'geomtype' => 'geometry',
            'srid' => 32650
        ]
    ];
}
