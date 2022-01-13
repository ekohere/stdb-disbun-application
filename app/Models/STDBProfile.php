<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBProfile
 * @package App\Models
 * @version December 10, 2021, 12:38 pm UTC
 *
 * @property \App\Models\User $users
 * @property integer $users_id
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $no_ktp
 * @property string $alamat
 * @property string $kecamatan
 * @property string $desa
 * @property string $jenis_kelamin
 * @property string $status_dlm_keluarga
 * @property integer $jml_anggota_keluarga
 * @property string $pendidikan_terakhir
 * @property string $pekerjaan_lain
 */
class STDBProfile extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_pemilik_kebun';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'users_id',
        'tempat_lahir',
        'tgl_lahir',
        'no_ktp',
        'nama_ktp',
        'kontak',
        'alamat',
        'kecamatan',
        'desa',
        'jenis_kelamin',
        'status_dlm_keluarga',
        'jml_anggota_keluarga',
        'pendidikan_terakhir',
        'pekerjaan_lain'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'tempat_lahir' => 'string',
        'tgl_lahir' => 'date',
        'no_ktp' => 'string',
        'alamat' => 'string',
        'kecamatan' => 'string',
        'desa' => 'string',
        'jenis_kelamin' => 'string',
        'status_dlm_keluarga' => 'string',
        'jml_anggota_keluarga' => 'integer',
        'pendidikan_terakhir' => 'string',
        'pekerjaan_lain' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'required',
        'tempat_lahir' => 'nullable|string|max:255',
        'tgl_lahir' => 'nullable',
        'no_ktp' => 'nullable|string|max:255',
        'alamat' => 'nullable|string',
        'kecamatan' => 'nullable|string|max:255',
        'desa' => 'nullable|string|max:255',
        'jenis_kelamin' => 'nullable|string|max:45',
        'status_dlm_keluarga' => 'nullable|string|max:255',
        'jml_anggota_keluarga' => 'nullable|integer',
        'pendidikan_terakhir' => 'nullable|string|max:255',
        'pekerjaan_lain' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    public function stdbPersil()
    {
        return $this->hasMany(\App\Models\STDBPersil::class, 'stdb_pemilik_kebun_id');
    }
}
