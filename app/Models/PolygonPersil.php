<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MStaack\LaravelPostgis\Eloquent\PostgisTrait;

class PolygonPersil extends Model
{
    use PostgisTrait;

    /*public function __construct($tableName)
    {
        $this->table=$tableName;
        parent::__construct();
    }*/

    protected $connection = 'pgsql';
    protected $table = 'polygon_persil';
    protected $fillable = [
        'geom',
        'area',
        'geom_cc_rtrw',
        'geom_cc_apl',
        'area_cc_rtrw',
        'area_cc_apl'
    ];
    protected $postgisFields = [
        'geom',
        'geom_cc_rtrw',
        'geom_cc_apl'
    ];
    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 4326
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

    public function persilPolygon()
    {
        return $this->morphMany(Persil::class, 'polygon_persil_id');
    }
    public function stdbPersilPolygon()
    {
        return $this->morphMany(STDBPersil::class, 'polygon_persil_id');
    }
}
