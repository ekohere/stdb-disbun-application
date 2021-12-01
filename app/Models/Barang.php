<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Barang
 * @package App\Models
 * @version November 30, 2021, 10:45 am UTC
 *
 * @property \App\Models\JenisBarang $jenisBarang
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $itemPembelianBarangs
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $jenis_barang_id
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string $kode_jenis_barang
 * @property string $satuan
 */
class Barang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'jenis_barang_id',
        'kode_barang',
        'nama_barang',
        'kode_jenis_barang',
        'satuan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'koperasi_id' => 'integer',
        'kode_koperasi' => 'string',
        'jenis_barang_id' => 'integer',
        'kode_barang' => 'string',
        'nama_barang' => 'string',
        'kode_jenis_barang' => 'string',
        'satuan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'jenis_barang_id' => 'nullable|integer',
        'kode_barang' => 'required|string|max:50',
        'nama_barang' => 'required|string|max:150',
        'kode_jenis_barang' => 'required|string|max:50',
        'satuan' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisBarang()
    {
        return $this->belongsTo(\App\Models\JenisBarang::class, 'jenis_barang_id');
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
    public function itemPembelianBarangs()
    {
        return $this->hasMany(\App\Models\ItemPembelianBarang::class, 'barang_id');
    }
}
