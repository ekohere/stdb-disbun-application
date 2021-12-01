<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KategoriPemeliharaan
 * @package App\Models
 * @version December 1, 2021, 4:48 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $pemeliharaans
 * @property string $kategori_pemeliharaan
 */
class KategoriPemeliharaan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kategori_pemeliharaan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kategori_pemeliharaan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kategori_pemeliharaan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_pemeliharaan' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pemeliharaans()
    {
        return $this->hasMany(\App\Models\Pemeliharaan::class, 'kategori_pemeliharaan_id');
    }
}
