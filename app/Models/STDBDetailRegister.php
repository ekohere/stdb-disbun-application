<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBDetailRegister
 * @package App\Models
 * @version December 10, 2021, 1:27 pm UTC
 *
 * @property \App\Models\Persil $persil
 * @property \App\Models\StdbPersil $stdbPersil
 * @property \App\Models\StdbRegister $stdbRegister
 * @property integer $stdb_register_id
 * @property integer $stdb_persil_id
 * @property integer $persil_id
 */
class STDBDetailRegister extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_detail_regis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'stdb_register_id',
        'stdb_persil_id',
        'persil_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stdb_register_id' => 'integer',
        'stdb_persil_id' => 'integer',
        'persil_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stdb_register_id' => 'required|integer',
        'stdb_persil_id' => 'nullable|integer',
        'persil_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persil()
    {
        return $this->belongsTo(\App\Models\Persil::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stdbPersil()
    {
        return $this->belongsTo(\App\Models\StdbPersil::class, 'stdb_persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stdbRegister()
    {
        return $this->belongsTo(\App\Models\StdbRegister::class, 'stdb_register_id');
    }
}
