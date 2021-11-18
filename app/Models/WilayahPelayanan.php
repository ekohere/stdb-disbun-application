<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WilayahPelayanan
 * @package App\Models
 * @version August 28, 2021, 3:10 am UTC
 *
 * @property \App\Models\Pelayanan $pelayanan
 * @property \App\Models\Wilayah $wilayah
 * @property integer $wilayah_id
 * @property integer $pelayanan_id
 */
class WilayahPelayanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'wilayah_pelayanan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'wilayah_id',
        'pelayanan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'wilayah_id' => 'integer',
        'pelayanan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'wilayah_id' => 'required',
        'pelayanan_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pelayanan()
    {
        return $this->belongsTo(\App\Models\Pelayanan::class, 'pelayanan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function wilayah()
    {
        return $this->belongsTo(\App\Models\Wilayah::class, 'wilayah_id');
    }
}
