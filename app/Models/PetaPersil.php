<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PetaPersil
 * @package App\Models
 * @version November 30, 2021, 2:48 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $judul
 * @property string $file_geojson
 * @property string $aktif
 */
class PetaPersil extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'peta_persils';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'judul',
        'file_geojson',
        'aktif'
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
        'judul' => 'string',
        'file_geojson' => 'string',
        'aktif' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'judul' => 'required|string|max:250',
        'file_geojson' => 'required|string|max:250',
        'aktif' => 'required|string',
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
}
