<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ItemPilihan
 * @package App\Models
 * @version August 28, 2021, 3:18 am UTC
 *
 * @property \App\Models\SyaratPelayanan $syaratPelayanan
 * @property string $name
 * @property string $information
 * @property integer $syarat_pelayanan_id
 */
class ItemPilihan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'item_pilihan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'information',
        'syarat_pelayanan_id'
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
        'syarat_pelayanan_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'information' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'syarat_pelayanan_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function syaratPelayanan()
    {
        return $this->belongsTo(\App\Models\SyaratPelayanan::class, 'syarat_pelayanan_id');
    }
}
