<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pelayanan
 * @package App\Models
 * @version August 28, 2021, 3:09 am UTC
 *
 * @property \App\Models\JenisPelayanan $jenisPelayanan
 * @property \Illuminate\Database\Eloquent\Collection $syaratPelayanans
 * @property \Illuminate\Database\Eloquent\Collection $wilayahPelayanans
 * @property string $name
 * @property string $information
 * @property integer $jenis_pelayanan_id
 */
class Pelayanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pelayanan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'information',
        'jenis_pelayanan_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'information' => 'string',
        'jenis_pelayanan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'information' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'jenis_pelayanan_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisPelayanan()
    {
        return $this->belongsTo(\App\Models\JenisPelayanan::class, 'jenis_pelayanan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function syaratPelayanans()
    {
        return $this->hasMany(\App\Models\SyaratPelayanan::class, 'pelayanan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function wilayahPelayanans()
    {
        return $this->hasMany(\App\Models\WilayahPelayanan::class, 'pelayanan_id');
    }
}
