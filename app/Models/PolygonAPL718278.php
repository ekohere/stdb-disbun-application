<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class PolygonAPL718278 extends Model
{
    use PostgisTrait;
    protected $connection = 'pgsql';

    protected $table = 'apl_sk718_278';

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
