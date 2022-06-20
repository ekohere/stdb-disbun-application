<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Resources
 * @package App\Models
 * @version April 3, 2022, 6:22 am UTC
 *
 * @property string $name
 * @property string $package_id
 * @property string $description
 * @property string $format
 * @property string $year
 */
class Resources extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'od_resources';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'package_id',
        'description',
        'format',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'package_id' => 'string',
        'description' => 'string',
        'format' => 'string',
        'year' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string',
        'package_id' => 'required|string|max:255',
        'description' => 'nullable|string',
        'format' => 'nullable|string|max:255',
        'year' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function package()
    {
        return $this->belongsTo(\App\Models\Dataset::class, 'package_id');
    }
}
