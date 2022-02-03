<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KphHasKecamatan
 * @package App\Models
 * @version February 3, 2022, 5:09 pm UTC
 *
 * @property \App\Models\Kecamatan $kecamatan
 * @property \App\Models\Kph $kph
 * @property integer $kecamatan_id
 */
class KphHasKecamatan extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'kph_has_kecamatan';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kecamatan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kph_id' => 'integer',
        'kecamatan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kecamatan_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kecamatan()
    {
        return $this->belongsTo(\App\Models\Kecamatan::class, 'kecamatan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kph()
    {
        return $this->belongsTo(\App\Models\Kph::class, 'kph_id');
    }
}
