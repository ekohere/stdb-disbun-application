<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Driver
 * @package App\Models
 * @version November 30, 2021, 10:43 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $spbs
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property string $kode_sopir
 * @property string $nama_driver
 * @property string $lampiran_sim
 * @property string $hp
 * @property string $alamat
 */
class Driver extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'drivers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'kode_sopir',
        'nama_driver',
        'lampiran_sim',
        'hp',
        'alamat'
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
        'kode_sopir' => 'string',
        'nama_driver' => 'string',
        'lampiran_sim' => 'string',
        'hp' => 'string',
        'alamat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'kode_sopir' => 'required|string|max:50',
        'nama_driver' => 'required|string|max:150',
        'lampiran_sim' => 'nullable|string|max:250',
        'hp' => 'required|string|max:50',
        'alamat' => 'nullable|string|max:250',
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
    public function spbs()
    {
        return $this->hasMany(\App\Models\Spb::class, 'driver_id');
    }
}
