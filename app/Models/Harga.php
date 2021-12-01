<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Harga
 * @package App\Models
 * @version November 30, 2021, 10:49 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $kontraks
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $bulan
 * @property string $tahun
 * @property number $harga3
 * @property number $harga4
 * @property number $harga5
 * @property number $harga6
 * @property number $harga7
 * @property number $harga8
 * @property number $harga9
 * @property number $harga10
 * @property string $keterangan
 * @property string $nomor_sk_gub
 * @property string $tgl_sk_gub
 * @property string $file_sk_gub
 */
class Harga extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'harga';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'bulan',
        'tahun',
        'harga3',
        'harga4',
        'harga5',
        'harga6',
        'harga7',
        'harga8',
        'harga9',
        'harga10',
        'keterangan',
        'nomor_sk_gub',
        'tgl_sk_gub',
        'file_sk_gub'
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
        'bulan' => 'integer',
        'tahun' => 'date',
        'harga3' => 'decimal:0',
        'harga4' => 'decimal:0',
        'harga5' => 'decimal:0',
        'harga6' => 'decimal:0',
        'harga7' => 'decimal:0',
        'harga8' => 'decimal:0',
        'harga9' => 'decimal:0',
        'harga10' => 'decimal:0',
        'keterangan' => 'string',
        'nomor_sk_gub' => 'string',
        'tgl_sk_gub' => 'date',
        'file_sk_gub' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'nullable|string|max:50',
        'bulan' => 'required|integer',
        'tahun' => 'required',
        'harga3' => 'required|numeric',
        'harga4' => 'required|numeric',
        'harga5' => 'required|numeric',
        'harga6' => 'required|numeric',
        'harga7' => 'required|numeric',
        'harga8' => 'required|numeric',
        'harga9' => 'nullable|numeric',
        'harga10' => 'required|numeric',
        'keterangan' => 'nullable|string|max:150',
        'nomor_sk_gub' => 'nullable|string|max:100',
        'tgl_sk_gub' => 'nullable',
        'file_sk_gub' => 'nullable|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'required',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kontraks()
    {
        return $this->hasMany(\App\Models\Kontrak::class, 'harga_id');
    }
}
