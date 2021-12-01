<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pengurus
 * @package App\Models
 * @version November 30, 2021, 5:36 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $nama
 * @property string $golongan
 * @property string $jabatan
 * @property string $nik
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $status_kawin
 * @property string $status
 */
class Pengurus extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pengurus';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'nama',
        'golongan',
        'jabatan',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'tgl_masuk',
        'tgl_keluar',
        'status_kawin',
        'status'
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
        'nama' => 'string',
        'golongan' => 'string',
        'jabatan' => 'string',
        'nik' => 'string',
        'tempat_lahir' => 'string',
        'tgl_lahir' => 'date',
        'alamat' => 'string',
        'tgl_masuk' => 'date',
        'tgl_keluar' => 'date',
        'status_kawin' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'nama' => 'required|string|max:80',
        'golongan' => 'nullable|string|max:150',
        'jabatan' => 'required|string|max:100',
        'nik' => 'required|string|max:50',
        'tempat_lahir' => 'required|string|max:150',
        'tgl_lahir' => 'required',
        'alamat' => 'required|string',
        'tgl_masuk' => 'required',
        'tgl_keluar' => 'nullable',
        'status_kawin' => 'required|string|max:50',
        'status' => 'required|string|max:50',
        'created_at' => 'required',
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
