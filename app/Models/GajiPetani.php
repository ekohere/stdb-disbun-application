<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GajiPetani
 * @package App\Models
 * @version November 30, 2021, 10:52 am UTC
 *
 * @property \App\Models\Anggotum $anggota
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $gajiPetaniItems
 * @property integer $koperasi_id
 * @property string $kode_koperasi
 * @property integer $anggota_id
 * @property string $kode_anggota
 * @property string $tipe_fee_koperasi
 * @property number $pot_koperasi
 * @property number $pot_transport
 * @property number $pot_admin
 * @property number $pot_biaya_timbang
 * @property number $pot_langsir
 * @property number $pot_kredit_saprodi
 * @property number $pot_perawatan_jalan
 * @property number $pot_iuran_wajib
 * @property number $pot_pinjaman_koperasi
 * @property number $pot_pupuk_induk
 * @property number $pot_pinjaman_bank
 * @property number $pot_zakat
 * @property number $pot_infaq
 * @property string $metode_pembayaran
 * @property integer $status_bayar
 * @property string $tgl_bayar
 */
class GajiPetani extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'gaji_petani';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'koperasi_id',
        'kode_koperasi',
        'anggota_id',
        'kode_anggota',
        'tipe_fee_koperasi',
        'pot_koperasi',
        'pot_transport',
        'pot_admin',
        'pot_biaya_timbang',
        'pot_langsir',
        'pot_kredit_saprodi',
        'pot_perawatan_jalan',
        'pot_iuran_wajib',
        'pot_pinjaman_koperasi',
        'pot_pupuk_induk',
        'pot_pinjaman_bank',
        'pot_zakat',
        'pot_infaq',
        'metode_pembayaran',
        'status_bayar',
        'tgl_bayar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'koperasi_id' => 'integer',
        'kode_koperasi' => 'string',
        'anggota_id' => 'integer',
        'kode_anggota' => 'string',
        'tipe_fee_koperasi' => 'string',
        'pot_koperasi' => 'float',
        'pot_transport' => 'float',
        'pot_admin' => 'float',
        'pot_biaya_timbang' => 'float',
        'pot_langsir' => 'float',
        'pot_kredit_saprodi' => 'float',
        'pot_perawatan_jalan' => 'float',
        'pot_iuran_wajib' => 'float',
        'pot_pinjaman_koperasi' => 'float',
        'pot_pupuk_induk' => 'float',
        'pot_pinjaman_bank' => 'float',
        'pot_zakat' => 'float',
        'pot_infaq' => 'float',
        'metode_pembayaran' => 'string',
        'status_bayar' => 'integer',
        'tgl_bayar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'koperasi_id' => 'nullable|integer',
        'kode_koperasi' => 'required|string|max:50',
        'anggota_id' => 'nullable',
        'kode_anggota' => 'required|string|max:50',
        'tipe_fee_koperasi' => 'required|string|max:50',
        'pot_koperasi' => 'required|numeric',
        'pot_transport' => 'required|numeric',
        'pot_admin' => 'required|numeric',
        'pot_biaya_timbang' => 'required|numeric',
        'pot_langsir' => 'required|numeric',
        'pot_kredit_saprodi' => 'required|numeric',
        'pot_perawatan_jalan' => 'required|numeric',
        'pot_iuran_wajib' => 'required|numeric',
        'pot_pinjaman_koperasi' => 'required|numeric',
        'pot_pupuk_induk' => 'required|numeric',
        'pot_pinjaman_bank' => 'required|numeric',
        'pot_zakat' => 'required|numeric',
        'pot_infaq' => 'required|numeric',
        'metode_pembayaran' => 'required|string|max:50',
        'status_bayar' => 'required|integer',
        'tgl_bayar' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggotum::class, 'anggota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gajiPetaniItems()
    {
        return $this->hasMany(\App\Models\GajiPetaniItem::class, 'gaji_petani_id');
    }
}
