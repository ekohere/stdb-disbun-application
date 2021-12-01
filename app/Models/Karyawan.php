<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Karyawan
 * @package App\Models
 * @version November 30, 2021, 2:49 am UTC
 *
 * @property \App\Models\KategoriPekerja $kategoriPekerja
 * @property \App\Models\Koperasi $koperasi
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $kategori_pekerja_id
 * @property string $nama
 * @property string $jabatan
 * @property string $kategori_pekerja
 * @property string $golongan_status
 * @property string $nik
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $status_kawin
 * @property string $jenis_kelamin
 * @property string $status
 * @property string $file_sk
 * @property string $lampiran_lainnya
 * @property string $riwayat_pekerjaan
 * @property number $gaji_pokok
 * @property number $tj_jabatan
 * @property number $tj_konsumsi
 * @property number $tj_harian
 * @property number $bonus_target_lembur
 */
class Karyawan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'karyawans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'kategori_pekerja_id',
        'nama',
        'jabatan',
        'kategori_pekerja',
        'golongan_status',
        'nik',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'tgl_masuk',
        'tgl_keluar',
        'status_kawin',
        'jenis_kelamin',
        'status',
        'file_sk',
        'lampiran_lainnya',
        'riwayat_pekerjaan',
        'gaji_pokok',
        'tj_jabatan',
        'tj_konsumsi',
        'tj_harian',
        'bonus_target_lembur'
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
        'kategori_pekerja_id' => 'integer',
        'nama' => 'string',
        'jabatan' => 'string',
        'kategori_pekerja' => 'string',
        'golongan_status' => 'string',
        'nik' => 'string',
        'tempat_lahir' => 'string',
        'tgl_lahir' => 'date',
        'alamat' => 'string',
        'tgl_masuk' => 'date',
        'tgl_keluar' => 'date',
        'status_kawin' => 'string',
        'jenis_kelamin' => 'string',
        'status' => 'string',
        'file_sk' => 'string',
        'lampiran_lainnya' => 'string',
        'riwayat_pekerjaan' => 'string',
        'gaji_pokok' => 'float',
        'tj_jabatan' => 'float',
        'tj_konsumsi' => 'float',
        'tj_harian' => 'float',
        'bonus_target_lembur' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'kategori_pekerja_id' => 'nullable|integer',
        'nama' => 'required|string|max:80',
        'jabatan' => 'required|string|max:100',
        'kategori_pekerja' => 'required|string|max:150',
        'golongan_status' => 'required|string|max:150',
        'nik' => 'required|string|max:50',
        'tempat_lahir' => 'required|string|max:150',
        'tgl_lahir' => 'required',
        'alamat' => 'required|string',
        'tgl_masuk' => 'required',
        'tgl_keluar' => 'nullable',
        'status_kawin' => 'required|string|max:50',
        'jenis_kelamin' => 'required|string',
        'status' => 'nullable|string|max:50',
        'file_sk' => 'nullable|string|max:250',
        'lampiran_lainnya' => 'nullable|string|max:250',
        'riwayat_pekerjaan' => 'nullable|string',
        'gaji_pokok' => 'nullable|numeric',
        'tj_jabatan' => 'required|numeric',
        'tj_konsumsi' => 'required|numeric',
        'tj_harian' => 'required|numeric',
        'bonus_target_lembur' => 'required|numeric',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategoriPekerja()
    {
        return $this->belongsTo(\App\Models\KategoriPekerja::class, 'kategori_pekerja_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }
}
