<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Anggota
 * @package App\Models
 * @version November 30, 2021, 2:34 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $gajiPetanis
 * @property \Illuminate\Database\Eloquent\Collection $penjualanSaprodis
 * @property \Illuminate\Database\Eloquent\Collection $persils
 * @property \Illuminate\Database\Eloquent\Collection $spbItems
 * @property string $kode_anggota
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property string $nama_ktp
 * @property string $nomor_ktp
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $alamat_ktp
 * @property string $alamat_desa_ktp
 * @property string $alamat_kec_ktp
 * @property string $jenis_kelamin
 * @property string $status_dlm_keluarga
 * @property integer $jml_anggota_keluarga
 * @property string $pendidikan_terakhir
 * @property string $pekerjaan_lain
 * @property string $lampiran_identitas
 * @property string $lampiran_foto_anggota
 * @property string $status_anggota
 */
class Anggota extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'anggota';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_anggota',
        'koperasi_id',
        'kode_koperasi',
        'nama_ktp',
        'nomor_ktp',
        'tempat_lahir',
        'tgl_lahir',
        'alamat_ktp',
        'alamat_desa_ktp',
        'alamat_kec_ktp',
        'jenis_kelamin',
        'status_dlm_keluarga',
        'jml_anggota_keluarga',
        'pendidikan_terakhir',
        'pekerjaan_lain',
        'lampiran_identitas',
        'lampiran_foto_anggota',
        'status_anggota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_anggota' => 'string',
        'koperasi_id' => 'integer',
        'kode_koperasi' => 'string',
        'nama_ktp' => 'string',
        'nomor_ktp' => 'string',
        'tempat_lahir' => 'string',
        'tgl_lahir' => 'date',
        'alamat_ktp' => 'string',
        'alamat_desa_ktp' => 'string',
        'alamat_kec_ktp' => 'string',
        'jenis_kelamin' => 'string',
        'status_dlm_keluarga' => 'string',
        'jml_anggota_keluarga' => 'integer',
        'pendidikan_terakhir' => 'string',
        'pekerjaan_lain' => 'string',
        'lampiran_identitas' => 'string',
        'lampiran_foto_anggota' => 'string',
        'status_anggota' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_anggota' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'nama_ktp' => 'required|string|max:150',
        'nomor_ktp' => 'required|string|max:150',
        'tempat_lahir' => 'required|string|max:150',
        'tgl_lahir' => 'nullable',
        'alamat_ktp' => 'required|string|max:150',
        'alamat_desa_ktp' => 'required|string|max:150',
        'alamat_kec_ktp' => 'required|string|max:150',
        'jenis_kelamin' => 'required|string|max:25',
        'status_dlm_keluarga' => 'required|string|max:50',
        'jml_anggota_keluarga' => 'required|integer',
        'pendidikan_terakhir' => 'required|string|max:100',
        'pekerjaan_lain' => 'required|string|max:100',
        'lampiran_identitas' => 'nullable|string|max:250',
        'lampiran_foto_anggota' => 'nullable|string|max:250',
        'status_anggota' => 'required|string|max:50',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gajiPetanis()
    {
        return $this->hasMany(\App\Models\GajiPetani::class, 'anggota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanSaprodis()
    {
        return $this->hasMany(\App\Models\PenjualanSaprodi::class, 'anggota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function persils()
    {
        return $this->hasMany(\App\Models\Persil::class, 'anggota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbItems()
    {
        return $this->hasMany(\App\Models\SpbItem::class, 'anggota_id');
    }
}
