<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Transport
 * @package App\Models
 * @version November 30, 2021, 10:41 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $spbs
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $nama_pemilik
 * @property string $alamat_pemilik
 * @property string $kapasitas
 * @property string $nomor_plat
 * @property string $kode_transport
 * @property string $lampiran_stnk
 * @property string $lampiran_lainnya
 * @property string $ket
 */
class Transport extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transports';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'nama_pemilik',
        'alamat_pemilik',
        'kapasitas',
        'nomor_plat',
        'kode_transport',
        'lampiran_stnk',
        'lampiran_lainnya',
        'ket'
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
        'nama_pemilik' => 'string',
        'alamat_pemilik' => 'string',
        'kapasitas' => 'string',
        'nomor_plat' => 'string',
        'kode_transport' => 'string',
        'lampiran_stnk' => 'string',
        'lampiran_lainnya' => 'string',
        'ket' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'nama_pemilik' => 'required|string|max:75',
        'alamat_pemilik' => 'required|string',
        'kapasitas' => 'nullable|string|max:150',
        'nomor_plat' => 'required|string|max:20',
        'kode_transport' => 'nullable|string|max:50',
        'lampiran_stnk' => 'nullable|string|max:250',
        'lampiran_lainnya' => 'nullable|string|max:250',
        'ket' => 'nullable|string|max:250',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbs()
    {
        return $this->hasMany(\App\Models\Spb::class, 'transport_id');
    }
}
