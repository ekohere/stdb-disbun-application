<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Feature
 * @package App\Models
 * @version November 30, 2021, 6:41 am UTC
 *
 * @property string $name_feature
 * @property string $description
 * @property string $images
 */
class Feature extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'features';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


//    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_feature',
        'description',
        'images'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name_feature' => 'string',
        'description' => 'string',
        'images' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_feature' => 'required|string|max:250',
        'description' => 'required|string',
        'images' => 'nullable|string|max:250',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
