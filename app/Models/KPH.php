<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KPH
 * @package App\Models
 * @version February 3, 2022, 8:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $kecamatans
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $nama
 * @property string $unit_kph
 * @property integer $polygon_id
 */
class KPH extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kph';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'unit_kph',
        'polygon_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'unit_kph' => 'string',
        'polygon_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'nullable|string|max:255',
        'unit_kph' => 'nullable|string|max:255',
        'polygon_id' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function kecamatans()
    {
        return $this->belongsToMany(\App\Models\Kecamatan::class, 'kph_has_kecamatan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'kph_id');
    }

    public function polygonKPH()
    {
        return $this->belongsTo(\App\Models\PolygonKPH::class, 'polygon_id');
    }
}
