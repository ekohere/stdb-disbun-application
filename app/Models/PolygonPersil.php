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
    protected $fillable = ['geom','area'];
    protected $postgisFields = [
        'geom'
    ];
    protected $postgisTypes = [
        'geom' => [
            'geomtype' => 'geometry',
            'srid' => 4326
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
