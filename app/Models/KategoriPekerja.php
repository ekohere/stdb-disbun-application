<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class KategoriPekerja
 * @package App\Models
 * @version December 1, 2021, 4:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $karyawans
 * @property \Illuminate\Database\Eloquent\Collection $pekerjas
 * @property string $kategori_pekerja
 */
class KategoriPekerja extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'kategori_pekerja';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kategori_pekerja'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kategori_pekerja' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_pekerja' => 'required|string|max:50',
        'created_at' => 'required',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'kategori_pekerja_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pekerjas()
    {
        return $this->hasMany(\App\Models\Pekerja::class, 'kategori_pekerja_id');
    }
}
