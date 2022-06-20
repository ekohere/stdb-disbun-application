<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dataset
 * @package App\Models
 * @version April 3, 2022, 6:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $odResources
 * @property string $name
 * @property string $owner_org_id
 * @property string $org_name
 */
class Dataset extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'od_dataset';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'name',
        'owner_org_id',
        'org_name',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'owner_org_id' => 'string',
        'org_name' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string',
        'owner_org_id' => 'nullable|string|max:255',
        'org_name' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function odResources()
    {
        return $this->hasMany(\App\Models\Resources::class, 'package_id');
    }
}
