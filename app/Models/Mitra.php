<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Mitra
 * @package App\Models
 * @version November 30, 2021, 10:38 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $nomor_mitra
 * @property string $nama_mitra
 * @property string $jenis
 * @property string $alamat
 * @property string $kontak
 * @property string $email
 * @property string $status
 */
class Mitra extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mitra';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'nomor_mitra',
        'nama_mitra',
        'jenis',
        'alamat',
        'kontak',
        'email',
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
        'nomor_mitra' => 'string',
        'nama_mitra' => 'string',
        'jenis' => 'string',
        'alamat' => 'string',
        'kontak' => 'string',
        'email' => 'string',
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
        'nomor_mitra' => 'required|string|max:50',
        'nama_mitra' => 'required|string|max:150',
        'jenis' => 'required|string|max:50',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:25',
        'email' => 'nullable|string|max:75',
        'status' => 'required|string|max:50',
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
