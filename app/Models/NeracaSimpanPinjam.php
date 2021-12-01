<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NeracaSimpanPinjam
 * @package App\Models
 * @version December 1, 2021, 3:37 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $periode
 * @property number $jml_kas
 * @property string $piutang_tahun
 * @property number $jml_piutang_tahun
 * @property number $simpanan_pokok
 * @property number $simpanan_wajib
 * @property number $laba
 */
class NeracaSimpanPinjam extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'neraca_simpan_pinjams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'periode',
        'jml_kas',
        'piutang_tahun',
        'jml_piutang_tahun',
        'simpanan_pokok',
        'simpanan_wajib',
        'laba'
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
        'periode' => 'string',
        'jml_kas' => 'float',
        'piutang_tahun' => 'date',
        'jml_piutang_tahun' => 'float',
        'simpanan_pokok' => 'float',
        'simpanan_wajib' => 'float',
        'laba' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'periode' => 'required|string|max:250',
        'jml_kas' => 'required|numeric',
        'piutang_tahun' => 'required',
        'jml_piutang_tahun' => 'required|numeric',
        'simpanan_pokok' => 'required|numeric',
        'simpanan_wajib' => 'required|numeric',
        'laba' => 'required|numeric',
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
}
