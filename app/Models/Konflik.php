<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Konflik
 * @package App\Models
 * @version December 1, 2021, 4:40 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Persil $persil
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property integer $persil_id
 * @property string $tgl_konflik
 * @property string $pihak_terlibat
 * @property string $jenis_konflik
 * @property string $deskripsi_singkat
 * @property string $penyelesaian
 * @property string $keterangan
 * @property string $status
 */
class Konflik extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'konflik';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'persil_id',
        'tgl_konflik',
        'pihak_terlibat',
        'jenis_konflik',
        'deskripsi_singkat',
        'penyelesaian',
        'keterangan',
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
        'persil_id' => 'integer',
        'tgl_konflik' => 'date',
        'pihak_terlibat' => 'string',
        'jenis_konflik' => 'string',
        'deskripsi_singkat' => 'string',
        'penyelesaian' => 'string',
        'keterangan' => 'string',
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
        'persil_id' => 'required',
        'tgl_konflik' => 'required',
        'pihak_terlibat' => 'nullable|string|max:199',
        'jenis_konflik' => 'required|string',
        'deskripsi_singkat' => 'nullable|string',
        'penyelesaian' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'status' => 'required|string|max:50',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function persil()
    {
        return $this->belongsTo(\App\Models\Persil::class, 'persil_id');
    }
}
