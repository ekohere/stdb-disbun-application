<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class PolygonKPH extends Model
{
    use PostgisTrait;

    /*public function __construct($tableName)
    {
        $this->table=$tableName;
        parent::__construct();
    }*/

    protected $connection = 'pgsql';
    protected $table = 'kph_kutim';

    protected $postgisFields = [
        'geom'
    ];
    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 32650
        ]
    ];

    public function kph()
    {
        return $this->hasOne(KPH::class, 'polygon_id');
    }
}
