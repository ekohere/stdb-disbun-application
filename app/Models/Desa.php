<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Desa
 * @package App\Models
 * @version January 17, 2022, 3:05 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $kode_kec
 * @property string $kode_desa
 * @property string $nama_desa
 */
class Desa extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'desa';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_kec',
        'kode_desa',
        'nama_desa'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_kec' => 'string',
        'kode_desa' => 'string',
        'nama_desa' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_kec' => 'required|string|max:50',
        'kode_desa' => 'required|string|max:50',
        'nama_desa' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'desa_id');
    }
}
