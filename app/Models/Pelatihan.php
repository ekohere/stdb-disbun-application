<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pelatihan
 * @package App\Models
 * @version December 1, 2021, 4:44 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $topik
 * @property string $tgl
 * @property string $file_dok
 * @property integer $jml_peserta
 * @property string $pelaksana
 */
class Pelatihan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pelatihan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'topik',
        'tgl',
        'file_dok',
        'jml_peserta',
        'pelaksana'
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
        'topik' => 'string',
        'tgl' => 'date',
        'file_dok' => 'string',
        'jml_peserta' => 'integer',
        'pelaksana' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'topik' => 'required|string|max:255',
        'tgl' => 'required',
        'file_dok' => 'nullable|string|max:250',
        'jml_peserta' => 'nullable|integer',
        'pelaksana' => 'nullable|string|max:250',
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
}
