<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BarangSaprodi
 * @package App\Models
 * @version November 30, 2021, 10:47 am UTC
 *
 * @property \App\Models\JenisBarangSaprodi $jenisBarangSaprodi
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $penjualanSaprodiItems
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $jenis_barang_saprodi_id
 * @property string $kode_jenis_barang_saprodi
 * @property string $nama_saprodi
 * @property string $satuan
 */
class BarangSaprodi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'barang_saprodi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'jenis_barang_saprodi_id',
        'kode_jenis_barang_saprodi',
        'nama_saprodi',
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
        'jenis_barang_saprodi_id' => 'integer',
        'kode_jenis_barang_saprodi' => 'string',
        'nama_saprodi' => 'string',
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
        'jenis_barang_saprodi_id' => 'nullable|integer',
        'kode_jenis_barang_saprodi' => 'required|string|max:50',
        'nama_saprodi' => 'required|string|max:250',
        'satuan' => 'required|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisBarangSaprodi()
    {
        return $this->belongsTo(\App\Models\JenisBarangSaprodi::class, 'jenis_barang_saprodi_id');
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
    public function penjualanSaprodiItems()
    {
        return $this->hasMany(\App\Models\PenjualanSaprodiItem::class, 'barang_saprodi_id');
    }
}
