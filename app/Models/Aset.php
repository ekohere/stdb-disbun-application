<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Aset
 * @package App\Models
 * @version November 30, 2021, 10:40 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property string $nomor
 * @property string $nama
 * @property string $tahun
 * @property number $nilai_awal
 * @property number $nilai_akhir
 * @property string $kondisi
 * @property string $foto
 * @property string $pemakai
 * @property string $keterangan
 */
class Aset extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'aset';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'nomor',
        'nama',
        'tahun',
        'nilai_awal',
        'nilai_akhir',
        'kondisi',
        'foto',
        'pemakai',
        'keterangan'
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
        'nomor' => 'string',
        'nama' => 'string',
        'tahun' => 'string',
        'nilai_awal' => 'float',
        'nilai_akhir' => 'float',
        'kondisi' => 'string',
        'foto' => 'string',
        'pemakai' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'nomor' => 'required|string|max:100',
        'nama' => 'required|string|max:255',
        'tahun' => 'required|string|max:4',
        'nilai_awal' => 'nullable|numeric',
        'nilai_akhir' => 'nullable|numeric',
        'kondisi' => 'required|string',
        'foto' => 'nullable|string|max:250',
        'pemakai' => 'nullable|string|max:150',
        'keterangan' => 'nullable|string',
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
