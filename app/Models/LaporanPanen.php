<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LaporanPanen
 * @package App\Models
 * @version December 1, 2021, 4:38 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Pekerja $pekerja
 * @property \App\Models\Persil $persil
 * @property \Illuminate\Database\Eloquent\Collection $penjualanTbs
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property integer $persil_id
 * @property integer $pekerja_id
 * @property string $kode_panen
 * @property integer $nomor_persil
 * @property string $tgl_panen
 * @property number $luas
 * @property integer $rotasi
 * @property integer $hk
 * @property integer $jml_jjg
 * @property number $berat_brondol
 * @property number $berat_kirim
 * @property string $keterangan
 */
class LaporanPanen extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'laporan_panen';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'persil_id',
        'pekerja_id',
        'kode_panen',
        'nomor_persil',
        'tgl_panen',
        'luas',
        'rotasi',
        'hk',
        'jml_jjg',
        'berat_brondol',
        'berat_kirim',
        'keterangan'
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
        'persil_id' => 'integer',
        'pekerja_id' => 'integer',
        'kode_panen' => 'string',
        'nomor_persil' => 'integer',
        'tgl_panen' => 'date',
        'luas' => 'float',
        'rotasi' => 'integer',
        'hk' => 'integer',
        'jml_jjg' => 'integer',
        'berat_brondol' => 'float',
        'berat_kirim' => 'float',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'persil_id' => 'nullable',
        'pekerja_id' => 'nullable',
        'kode_panen' => 'required|string|max:150',
        'nomor_persil' => 'required|integer',
        'tgl_panen' => 'required',
        'luas' => 'required|numeric',
        'rotasi' => 'nullable|integer',
        'hk' => 'nullable|integer',
        'jml_jjg' => 'nullable',
        'berat_brondol' => 'nullable|numeric',
        'berat_kirim' => 'nullable|numeric',
        'keterangan' => 'nullable|string',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pekerja()
    {
        return $this->belongsTo(\App\Models\Pekerja::class, 'pekerja_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persil()
    {
        return $this->belongsTo(\App\Models\Persil::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanTbs()
    {
        return $this->hasMany(\App\Models\PenjualanTb::class, 'panen_id');
    }
}
