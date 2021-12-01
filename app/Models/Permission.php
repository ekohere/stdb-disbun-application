<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Permission
 * @package App\Models
 * @version December 1, 2021, 4:56 am UTC
 *
 * @property \App\Models\ModelHasPermission $modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property string $name
 * @property string $guard_name
 * @property string $key
 * @property string $table_name
 */
class Permission extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'permissions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'guard_name',
        'key',
        'table_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string',
        'key' => 'string',
        'table_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'guard_name' => 'nullable|string|max:255',
        'key' => 'required|string|max:255',
        'table_name' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function modelHasPermission()
    {
        return $this->hasOne(\App\Models\ModelHasPermission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_has_permissions');
    }
}
