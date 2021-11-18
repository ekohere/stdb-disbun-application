<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SyaratPelayanan
 * @package App\Models
 * @version August 28, 2021, 3:14 am UTC
 *
 * @property \App\Models\FileDownload $fileDownload
 * @property \App\Models\Pelayanan $pelayanan
 * @property \App\Models\TipeSyarat $tipeSyarat
 * @property \Illuminate\Database\Eloquent\Collection $itemPilihans
 * @property string $name
 * @property integer $tipe_syarat_id
 * @property string $information
 * @property boolean $required
 * @property integer $pelayanan_id
 * @property integer $file_download_id
 */
class SyaratPelayanan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'syarat_pelayanan';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'tipe_syarat_id',
        'information',
        'required',
        'pelayanan_id',
        'file_download_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'tipe_syarat_id' => 'integer',
        'information' => 'string',
        'required' => 'boolean',
        'pelayanan_id' => 'integer',
        'file_download_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'tipe_syarat_id' => 'required',
        'information' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'pelayanan_id' => 'required',
        'file_download_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fileDownload()
    {
        return $this->belongsTo(\App\Models\FileDownload::class, 'file_download_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pelayanan()
    {
        return $this->belongsTo(\App\Models\Pelayanan::class, 'pelayanan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipeSyarat()
    {
        return $this->belongsTo(\App\Models\TipeSyarat::class, 'tipe_syarat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function itemPilihans()
    {
        return $this->hasMany(\App\Models\ItemPilihan::class, 'syarat_pelayanan_id');
    }
}
