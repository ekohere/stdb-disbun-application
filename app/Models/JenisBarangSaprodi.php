<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class JenisBarangSaprodi
 * @package App\Models
 * @version December 1, 2021, 4:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $barangSaprodis
 * @property string $kode_jenis_barang_saprodi
 * @property string $jenis_barang_saprodi
 */
class JenisBarangSaprodi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jenis_barang_saprodi';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_jenis_barang_saprodi',
        'jenis_barang_saprodi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_jenis_barang_saprodi' => 'string',
        'jenis_barang_saprodi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_jenis_barang_saprodi' => 'required|string|max:50',
        'jenis_barang_saprodi' => 'required|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function barangSaprodis()
    {
        return $this->hasMany(\App\Models\BarangSaprodi::class, 'jenis_barang_saprodi_id');
    }
}
