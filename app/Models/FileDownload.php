<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FileDownload
 * @package App\Models
 * @version August 28, 2021, 3:11 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $syaratPelayanans
 * @property string $name
 * @property string $information
 * @property string $slug
 */
class FileDownload extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'file_download';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'information',
        'slug'
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
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'information' => 'nullable|string|max:255',
        'slug' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function syaratPelayanans()
    {
        return $this->hasMany(\App\Models\SyaratPelayanan::class, 'file_download_id');
    }
}
