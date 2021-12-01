<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kontrak
 * @package App\Models
 * @version November 30, 2021, 10:44 am UTC
 *
 * @property \App\Models\Harga $harga
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Pk $pks
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property integer $pks_id
 * @property integer $harga_id
 * @property string $nomor_kontrak
 * @property string $tgl_kontrak
 * @property string $periode_kontrak
 * @property number $volume
 * @property number $harga_aktual
 * @property string $file_kontrak
 */
class Kontrak extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kontrak';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'pks_id',
        'harga_id',
        'nomor_kontrak',
        'tgl_kontrak',
        'periode_kontrak',
        'volume',
        'harga_aktual',
        'file_kontrak'
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
        'pks_id' => 'integer',
        'harga_id' => 'integer',
        'nomor_kontrak' => 'string',
        'tgl_kontrak' => 'date',
        'periode_kontrak' => 'string',
        'volume' => 'float',
        'harga_aktual' => 'float',
        'file_kontrak' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'pks_id' => 'nullable|integer',
        'harga_id' => 'nullable',
        'nomor_kontrak' => 'required|string|max:150',
        'tgl_kontrak' => 'required',
        'periode_kontrak' => 'required|string|max:250',
        'volume' => 'required|numeric',
        'harga_aktual' => 'required|numeric',
        'file_kontrak' => 'nullable|string|max:250',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function harga()
    {
        return $this->belongsTo(\App\Models\Harga::class, 'harga_id');
    }

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
    public function pks()
    {
        return $this->belongsTo(\App\Models\Pk::class, 'pks_id');
    }
}
