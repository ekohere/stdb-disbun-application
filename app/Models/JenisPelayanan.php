<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class JenisPelayanan
 * @package App\Models
 * @version August 28, 2021, 3:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $pelayanans
 * @property string $name
 * @property string $information
 */
class JenisPelayanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jenis_pelayanan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'information'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'information' => 'string'
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
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pelayanans()
    {
        return $this->hasMany(\App\Models\Pelayanan::class, 'jenis_pelayanan_id');
    }
}
