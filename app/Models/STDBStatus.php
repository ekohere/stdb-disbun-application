<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBStatus
 * @package App\Models
 * @version December 10, 2021, 12:40 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $stdbRegisters
 * @property string $name
 * @property string $desc
 */
class STDBStatus extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_status';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'desc' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function stdbRegisters()
    {
        return $this->belongsToMany(\App\Models\STDBRegister::class, 'stdb_register_has_stdb_status');
    }
    public function stdbRegisHasStatus()
    {
        return $this->hasOne(\App\Models\STDBRegisterHasSTDBStatus::class, 'stdb_status_id');
    }
}
