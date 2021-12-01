<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BahanPemeliharaan
 * @package App\Models
 * @version December 1, 2021, 4:49 am UTC
 *
 * @property \App\Models\KategoriBahanPemeliharaan $kategoriBahanPemeliharaan
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $itemBahanPemeliharaans
 * @property integer $kategori_bahan_pemeliharaan_id
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property string $nama_bahan
 * @property string $satuan
 */
class BahanPemeliharaan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bahan_pemeliharaan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kategori_bahan_pemeliharaan_id',
        'koperasi_id',
        'kode_koperasi',
        'nama_bahan',
        'satuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kategori_bahan_pemeliharaan_id' => 'integer',
        'koperasi_id' => 'integer',
        'kode_koperasi' => 'string',
        'nama_bahan' => 'string',
        'satuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_bahan_pemeliharaan_id' => 'required|integer',
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'nama_bahan' => 'required|string|max:250',
        'satuan' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategoriBahanPemeliharaan()
    {
        return $this->belongsTo(\App\Models\KategoriBahanPemeliharaan::class, 'kategori_bahan_pemeliharaan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function itemBahanPemeliharaans()
    {
        return $this->hasMany(\App\Models\ItemBahanPemeliharaan::class, 'bahan_pemeliharaan_id');
    }
}
