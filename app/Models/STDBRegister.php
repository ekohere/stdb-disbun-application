<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBRegister
 * @package App\Models
 * @version December 10, 2021, 1:27 pm UTC
 *
 * @property \App\Models\Anggotum $anggota
 * @property \App\Models\User $users
 * @property \Illuminate\Database\Eloquent\Collection $stdbDetailRegis
 * @property \Illuminate\Database\Eloquent\Collection $stdbStatuses
 * @property integer $users_id
 * @property integer $anggota_id
 */
class STDBRegister extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_register';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'users_id',
        'anggota_id'
    ];
    protected $appends = [
        'latest_status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'anggota_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'users_id' => 'required',
        'anggota_id' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stdbDetailRegis()
    {
        return $this->hasMany(\App\Models\STDBDetailRegister::class, 'stdb_register_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function stdbStatuses()
    {
        return $this->belongsToMany(\App\Models\StdbStatus::class, 'stdb_register_has_stdb_status','stdb_register_id','stdb_status_id');
    }

    public function getLatestStatusAttribute()
    {
        return $this->stdbStatuses()->latest('stdb_register_has_stdb_status.created_at')->first();
    }
}
