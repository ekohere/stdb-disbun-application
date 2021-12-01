<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pemeliharaan
 * @package App\Models
 * @version December 1, 2021, 4:43 am UTC
 *
 * @property \App\Models\KategoriPemeliharaan $kategoriPemeliharaan
 * @property \App\Models\Koperasi $koperasi
 * @property \App\Models\Persil $persil
 * @property \Illuminate\Database\Eloquent\Collection $itemBahanPemeliharaans
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $kode_persil
 * @property integer $persil_id
 * @property integer $kategori_pemeliharaan_id
 * @property number $luas_lahan
 * @property string $tgl_pelaksanaan
 * @property number $jml_luas_dikerjakan
 * @property integer $rotasi
 * @property integer $hk
 * @property number $nilai_pekerja
 * @property number $jml_transport
 * @property string $cara_aplikasi
 * @property string $mengunakan_apd
 * @property string $ket
 */
class Pemeliharaan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pemeliharaan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'kode_persil',
        'persil_id',
        'kategori_pemeliharaan_id',
        'luas_lahan',
        'tgl_pelaksanaan',
        'jml_luas_dikerjakan',
        'rotasi',
        'hk',
        'nilai_pekerja',
        'jml_transport',
        'cara_aplikasi',
        'mengunakan_apd',
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
        'kode_persil' => 'string',
        'persil_id' => 'integer',
        'kategori_pemeliharaan_id' => 'integer',
        'luas_lahan' => 'decimal:2',
        'tgl_pelaksanaan' => 'date',
        'jml_luas_dikerjakan' => 'decimal:2',
        'rotasi' => 'integer',
        'hk' => 'integer',
        'nilai_pekerja' => 'float',
        'jml_transport' => 'float',
        'cara_aplikasi' => 'string',
        'mengunakan_apd' => 'string',
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
        'kode_persil' => 'required|string|max:50',
        'persil_id' => 'nullable',
        'kategori_pemeliharaan_id' => 'nullable|integer',
        'luas_lahan' => 'nullable|numeric',
        'tgl_pelaksanaan' => 'nullable',
        'jml_luas_dikerjakan' => 'nullable|numeric',
        'rotasi' => 'nullable|integer',
        'hk' => 'nullable|integer',
        'nilai_pekerja' => 'nullable|numeric',
        'jml_transport' => 'nullable|numeric',
        'cara_aplikasi' => 'nullable|string|max:250',
        'mengunakan_apd' => 'required|string|max:50',
        'ket' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kategoriPemeliharaan()
    {
        return $this->belongsTo(\App\Models\KategoriPemeliharaan::class, 'kategori_pemeliharaan_id');
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
    public function persil()
    {
        return $this->belongsTo(\App\Models\Persil::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function itemBahanPemeliharaans()
    {
        return $this->hasMany(\App\Models\ItemBahanPemeliharaan::class, 'pemeliharaan_id');
    }
}
