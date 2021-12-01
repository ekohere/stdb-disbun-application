<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GajiKaryawan
 * @package App\Models
 * @version December 1, 2021, 3:27 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $periode_bulan
 * @property string $periode_tahun
 * @property integer $karyawan_id
 * @property number $gaji_pokok
 * @property number $tj_jabatan
 * @property number $tj_konsumsi
 * @property number $tj_harian
 * @property number $bonus_target_lembur
 * @property number $potongan_pph_21
 * @property number $potongan_asuransi
 * @property number $potongan_bulan_lalu
 */
class GajiKaryawan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'gaji';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'periode_bulan',
        'periode_tahun',
        'karyawan_id',
        'gaji_pokok',
        'tj_jabatan',
        'tj_konsumsi',
        'tj_harian',
        'bonus_target_lembur',
        'potongan_pph_21',
        'potongan_asuransi',
        'potongan_bulan_lalu'
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
        'periode_bulan' => 'integer',
        'periode_tahun' => 'date',
        'karyawan_id' => 'integer',
        'gaji_pokok' => 'float',
        'tj_jabatan' => 'float',
        'tj_konsumsi' => 'float',
        'tj_harian' => 'float',
        'bonus_target_lembur' => 'float',
        'potongan_pph_21' => 'float',
        'potongan_asuransi' => 'float',
        'potongan_bulan_lalu' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'periode_bulan' => 'required|integer',
        'periode_tahun' => 'required',
        'karyawan_id' => 'required|integer',
        'gaji_pokok' => 'required|numeric',
        'tj_jabatan' => 'required|numeric',
        'tj_konsumsi' => 'required|numeric',
        'tj_harian' => 'required|numeric',
        'bonus_target_lembur' => 'required|numeric',
        'potongan_pph_21' => 'required|numeric',
        'potongan_asuransi' => 'required|numeric',
        'potongan_bulan_lalu' => 'required|numeric',
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
}
