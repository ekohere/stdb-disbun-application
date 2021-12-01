<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PenjualanSaprodi
 * @package App\Models
 * @version November 30, 2021, 10:48 am UTC
 *
 * @property \App\Models\Anggotum $anggota
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $angsuranSaprodis
 * @property \Illuminate\Database\Eloquent\Collection $penjualanSaprodiItems
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $kode_anggota
 * @property integer $anggota_id
 * @property string $tanggal
 * @property string $no_nota
 * @property string $pembiayaan
 * @property string $ket
 */
class PenjualanSaprodi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'penjualan_saprodi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'kode_anggota',
        'anggota_id',
        'tanggal',
        'no_nota',
        'pembiayaan',
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
        'kode_anggota' => 'string',
        'anggota_id' => 'integer',
        'tanggal' => 'date',
        'no_nota' => 'string',
        'pembiayaan' => 'string',
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
        'kode_anggota' => 'required|string|max:50',
        'anggota_id' => 'nullable',
        'tanggal' => 'required',
        'no_nota' => 'required|string|max:150',
        'pembiayaan' => 'required|string|max:50',
        'ket' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggotum::class, 'anggota_id');
    }

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
    public function angsuranSaprodis()
    {
        return $this->hasMany(\App\Models\AngsuranSaprodi::class, 'penjualan_saprodi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanSaprodiItems()
    {
        return $this->hasMany(\App\Models\PenjualanSaprodiItem::class, 'penjualan_saprodi_id');
    }
}
