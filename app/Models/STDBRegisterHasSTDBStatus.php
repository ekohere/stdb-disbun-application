<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBRegisterHasSTDBStatus
 * @package App\Models
 * @version December 10, 2021, 1:29 pm UTC
 *
 * @property \App\Models\StdbRegister $stdbRegister
 * @property \App\Models\StdbStatus $stdbStatus
 * @property integer $stdb_status_id
 * @property string $message
 */
class STDBRegisterHasSTDBStatus extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_register_has_stdb_status';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'stdb_register_id',
        'stdb_status_id',
        'message',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'stdb_register_id' => 'integer',
        'stdb_status_id' => 'integer',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stdb_status_id' => 'required|integer',
        'message' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stdbRegister()
    {
        return $this->belongsTo(\App\Models\StdbRegister::class, 'stdb_register_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stdbStatus()
    {
        return $this->belongsTo(\App\Models\StdbStatus::class, 'stdb_status_id');
    }
}
