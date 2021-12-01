<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Spb
 * @package App\Models
 * @version November 30, 2021, 10:50 am UTC
 *
 * @property \App\Models\Driver $driver
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Pk $pksTujuan
 * @property \App\Models\Transport $transport
 * @property \Illuminate\Database\Eloquent\Collection $penjualanTbs
 * @property \Illuminate\Database\Eloquent\Collection $spbItems
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $no_spb
 * @property string $tgl_spb
 * @property integer $transport_id
 * @property integer $driver_id
 * @property integer $pks_tujuan
 * @property string $penerima
 * @property string $pengangkut
 * @property string $pengirim
 * @property string $jab_pengirim
 */
class Spb extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'spb';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'no_spb',
        'tgl_spb',
        'transport_id',
        'driver_id',
        'pks_tujuan',
        'penerima',
        'pengangkut',
        'pengirim',
        'jab_pengirim'
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
        'no_spb' => 'string',
        'tgl_spb' => 'date',
        'transport_id' => 'integer',
        'driver_id' => 'integer',
        'pks_tujuan' => 'integer',
        'penerima' => 'string',
        'pengangkut' => 'string',
        'pengirim' => 'string',
        'jab_pengirim' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'no_spb' => 'required|string|max:150',
        'tgl_spb' => 'required',
        'transport_id' => 'required|integer',
        'driver_id' => 'required|integer',
        'pks_tujuan' => 'nullable|integer',
        'penerima' => 'required|string|max:150',
        'pengangkut' => 'required|string|max:150',
        'pengirim' => 'required|string|max:150',
        'jab_pengirim' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function driver()
    {
        return $this->belongsTo(\App\Models\Driver::class, 'driver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pksTujuan()
    {
        return $this->belongsTo(\App\Models\Pk::class, 'pks_tujuan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transport()
    {
        return $this->belongsTo(\App\Models\Transport::class, 'transport_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function penjualanTbs()
    {
        return $this->hasMany(\App\Models\PenjualanTb::class, 'spb_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbItems()
    {
        return $this->hasMany(\App\Models\SpbItem::class, 'spb_id');
    }
}
