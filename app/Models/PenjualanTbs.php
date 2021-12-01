<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PenjualanTbs
 * @package App\Models
 * @version November 30, 2021, 10:51 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\LaporanPanen $panen
 * @property \App\Models\Spb $spb
 * @property \Illuminate\Database\Eloquent\Collection $persilPenjualanTbs
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property integer $panen_id
 * @property integer $spb_id
 * @property string $tgl_penjualan
 * @property number $pot_susut
 * @property number $pot_sortasi
 * @property number $harga_tbs
 * @property string $keterangan
 * @property string $file_upload
 */
class PenjualanTbs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'penjualan_tbs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'panen_id',
        'spb_id',
        'tgl_penjualan',
        'pot_susut',
        'pot_sortasi',
        'harga_tbs',
        'keterangan',
        'file_upload'
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
        'panen_id' => 'integer',
        'spb_id' => 'integer',
        'tgl_penjualan' => 'date',
        'pot_susut' => 'decimal:2',
        'pot_sortasi' => 'float',
        'harga_tbs' => 'float',
        'keterangan' => 'string',
        'file_upload' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'panen_id' => 'nullable',
        'spb_id' => 'required',
        'tgl_penjualan' => 'required',
        'pot_susut' => 'nullable|numeric',
        'pot_sortasi' => 'nullable|numeric',
        'harga_tbs' => 'nullable|numeric',
        'keterangan' => 'nullable|string|max:250',
        'file_upload' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function panen()
    {
        return $this->belongsTo(\App\Models\LaporanPanen::class, 'panen_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function spb()
    {
        return $this->belongsTo(\App\Models\Spb::class, 'spb_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function persilPenjualanTbs()
    {
        return $this->hasMany(\App\Models\PersilPenjualanTb::class, 'penjualan_tbs_id');
    }
}
