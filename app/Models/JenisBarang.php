<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class JenisBarang
 * @package App\Models
 * @version December 1, 2021, 4:45 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $barangs
 * @property \Illuminate\Database\Eloquent\Collection $pembelianBarangs
 * @property string $kode_jenis_barang
 * @property string $jenis_barang
 */
class JenisBarang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jenis_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_jenis_barang',
        'jenis_barang'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_jenis_barang' => 'string',
        'jenis_barang' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_jenis_barang' => 'required|string|max:50',
        'jenis_barang' => 'required|string|max:250',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function barangs()
    {
        return $this->hasMany(\App\Models\Barang::class, 'jenis_barang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pembelianBarangs()
    {
        return $this->hasMany(\App\Models\PembelianBarang::class, 'jenis_barang_id');
    }
}
