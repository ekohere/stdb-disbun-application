<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pks
 * @package App\Models
 * @version November 30, 2021, 10:37 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $kontraks
 * @property \Illuminate\Database\Eloquent\Collection $spbs
 * @property string $nama_perusahaan
 * @property string $mill_name
 * @property string $group_perusahaan
 * @property string $alamat_pabrik
 * @property string $koordinat_x
 * @property string $koordinat_y
 * @property integer $kapasitas_terpasang
 * @property integer $kapasitas_olah
 */
class Pks extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama_perusahaan',
        'mill_name',
        'group_perusahaan',
        'alamat_pabrik',
        'koordinat_x',
        'koordinat_y',
        'kapasitas_terpasang',
        'kapasitas_olah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_perusahaan' => 'string',
        'mill_name' => 'string',
        'group_perusahaan' => 'string',
        'alamat_pabrik' => 'string',
        'koordinat_x' => 'string',
        'koordinat_y' => 'string',
        'kapasitas_terpasang' => 'integer',
        'kapasitas_olah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_perusahaan' => 'required|string|max:150',
        'mill_name' => 'required|string|max:150',
        'group_perusahaan' => 'nullable|string|max:150',
        'alamat_pabrik' => 'required|string|max:150',
        'koordinat_x' => 'required|string|max:150',
        'koordinat_y' => 'required|string|max:150',
        'kapasitas_terpasang' => 'required|integer',
        'kapasitas_olah' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function kontraks()
    {
        return $this->hasMany(\App\Models\Kontrak::class, 'pks_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbs()
    {
        return $this->hasMany(\App\Models\Spb::class, 'pks_tujuan');
    }
}
