<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TipeSyarat
 * @package App\Models
 * @version August 28, 2021, 3:11 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $syaratPelayanans
 * @property string $name
 */
class TipeSyarat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tipe_syarat';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function syaratPelayanans()
    {
        return $this->hasMany(\App\Models\SyaratPelayanan::class, 'tipe_syarat_id');
    }
}
