<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KelolaLingkungan
 * @package App\Models
 * @version December 1, 2021, 4:40 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Persil $persil
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $persil_id
 * @property integer $petak_id
 * @property string $nama_pekebun
 * @property string $tgl_kelola
 * @property string $kegiatan
 * @property string $org_terlibat
 */
class KelolaLingkungan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kelola_lingkungan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'persil_id',
        'petak_id',
        'nama_pekebun',
        'tgl_kelola',
        'kegiatan',
        'org_terlibat'
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
        'persil_id' => 'integer',
        'petak_id' => 'integer',
        'nama_pekebun' => 'string',
        'tgl_kelola' => 'date',
        'kegiatan' => 'string',
        'org_terlibat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'persil_id' => 'nullable',
        'petak_id' => 'required',
        'nama_pekebun' => 'required|string|max:150',
        'tgl_kelola' => 'required',
        'kegiatan' => 'required|string',
        'org_terlibat' => 'nullable|string|max:250',
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
