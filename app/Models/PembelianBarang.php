<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PembelianBarang
 * @package App\Models
 * @version November 30, 2021, 10:46 am UTC
 *
 * @property \App\Models\JenisBarang $jenisBarang
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $itemPembelianBarangs
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property integer $jenis_barang_id
 * @property string $tgl_order
 * @property string $nomor_order
 * @property string $nomor_invoice
 * @property string $mata_uang
 * @property string $file_invoice
 * @property integer $pemasok
 */
class PembelianBarang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pembelian_barang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'jenis_barang_id',
        'tgl_order',
        'nomor_order',
        'nomor_invoice',
        'mata_uang',
        'file_invoice',
        'pemasok'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_koperasi' => 'string',
        'koperasi_id' => 'integer',
        'jenis_barang_id' => 'integer',
        'tgl_order' => 'date',
        'nomor_order' => 'string',
        'nomor_invoice' => 'string',
        'mata_uang' => 'string',
        'file_invoice' => 'string',
        'pemasok' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'jenis_barang_id' => 'required|integer',
        'tgl_order' => 'required',
        'nomor_order' => 'required|string|max:150',
        'nomor_invoice' => 'nullable|string|max:150',
        'mata_uang' => 'required|string|max:50',
        'file_invoice' => 'nullable|string|max:250',
        'pemasok' => 'required|integer',
        'created_at' => 'required',
        'updated_at' => 'required',
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
        return $this->hasMany(\App\Models\ItemPembelianBarang::class, 'pembelian_barang_id');
    }
}
