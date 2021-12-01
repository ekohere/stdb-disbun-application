<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KategoriBahanPemeliharaan
 * @package App\Models
 * @version December 1, 2021, 4:47 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bahanPemeliharaans
 * @property string $kategori_bahan_pemeliharaan
 */
class KategoriBahanPemeliharaan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kategori_bahan_pemeliharaan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kategori_bahan_pemeliharaan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kategori_bahan_pemeliharaan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_bahan_pemeliharaan' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bahanPemeliharaans()
    {
        return $this->hasMany(\App\Models\BahanPemeliharaan::class, 'kategori_bahan_pemeliharaan_id');
    }
}
