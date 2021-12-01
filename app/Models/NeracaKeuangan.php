<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NeracaKeuangan
 * @package App\Models
 * @version December 1, 2021, 3:47 am UTC
 *
 * @property \App\Models\Koperasi $koperasi
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $periode
 * @property number $kas_saprodi
 * @property number $kas_replanting
 * @property number $piutang_saprodi
 * @property number $piutang_simpin
 * @property number $stok_barang
 * @property number $potongan_admin
 * @property number $fee_pengelolaan_penjualan_tbs
 * @property number $ht_tanah
 * @property number $ht_bangunan_non_permanen
 * @property number $simpanan_pokok
 * @property number $simpanan_wajib
 * @property number $modal_tanah
 * @property number $modal_bangunan
 * @property number $modal_saprodi
 * @property number $biaya_bangun_kantor
 * @property number $biaya_atk_dan_konsumsi
 * @property number $biaya_rat
 * @property number $gaji
 * @property number $laba_simpin
 * @property number $laba_saprodi
 * @property number $laba_harta_tetap
 * @property number $pajak_saprodi
 * @property number $kas_admin
 * @property number $biaya_lain_1
 * @property number $biaya_lain_2
 * @property number $biaya_lain_3
 */
class NeracaKeuangan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'neraca_keuangan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'periode',
        'kas_saprodi',
        'kas_replanting',
        'piutang_saprodi',
        'piutang_simpin',
        'stok_barang',
        'potongan_admin',
        'fee_pengelolaan_penjualan_tbs',
        'ht_tanah',
        'ht_bangunan_non_permanen',
        'simpanan_pokok',
        'simpanan_wajib',
        'modal_tanah',
        'modal_bangunan',
        'modal_saprodi',
        'biaya_bangun_kantor',
        'biaya_atk_dan_konsumsi',
        'biaya_rat',
        'gaji',
        'laba_simpin',
        'laba_saprodi',
        'laba_harta_tetap',
        'pajak_saprodi',
        'kas_admin',
        'biaya_lain_1',
        'biaya_lain_2',
        'biaya_lain_3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_koperasi' => 'string',
        'koperasi_id' => 'integer',
        'periode' => 'string',
        'kas_saprodi' => 'float',
        'kas_replanting' => 'float',
        'piutang_saprodi' => 'float',
        'piutang_simpin' => 'float',
        'stok_barang' => 'float',
        'potongan_admin' => 'float',
        'fee_pengelolaan_penjualan_tbs' => 'float',
        'ht_tanah' => 'float',
        'ht_bangunan_non_permanen' => 'float',
        'simpanan_pokok' => 'float',
        'simpanan_wajib' => 'float',
        'modal_tanah' => 'float',
        'modal_bangunan' => 'float',
        'modal_saprodi' => 'float',
        'biaya_bangun_kantor' => 'float',
        'biaya_atk_dan_konsumsi' => 'float',
        'biaya_rat' => 'float',
        'gaji' => 'float',
        'laba_simpin' => 'float',
        'laba_saprodi' => 'float',
        'laba_harta_tetap' => 'float',
        'pajak_saprodi' => 'float',
        'kas_admin' => 'float',
        'biaya_lain_1' => 'float',
        'biaya_lain_2' => 'float',
        'biaya_lain_3' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'nullable|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'periode' => 'required|string|max:250',
        'kas_saprodi' => 'required|numeric',
        'kas_replanting' => 'required|numeric',
        'piutang_saprodi' => 'nullable|numeric',
        'piutang_simpin' => 'required|numeric',
        'stok_barang' => 'required|numeric',
        'potongan_admin' => 'required|numeric',
        'fee_pengelolaan_penjualan_tbs' => 'required|numeric',
        'ht_tanah' => 'required|numeric',
        'ht_bangunan_non_permanen' => 'required|numeric',
        'simpanan_pokok' => 'required|numeric',
        'simpanan_wajib' => 'required|numeric',
        'modal_tanah' => 'required|numeric',
        'modal_bangunan' => 'required|numeric',
        'modal_saprodi' => 'required|numeric',
        'biaya_bangun_kantor' => 'required|numeric',
        'biaya_atk_dan_konsumsi' => 'required|numeric',
        'biaya_rat' => 'required|numeric',
        'gaji' => 'required|numeric',
        'laba_simpin' => 'required|numeric',
        'laba_saprodi' => 'required|numeric',
        'laba_harta_tetap' => 'required|numeric',
        'pajak_saprodi' => 'required|numeric',
        'kas_admin' => 'required|numeric',
        'biaya_lain_1' => 'required|numeric',
        'biaya_lain_2' => 'required|numeric',
        'biaya_lain_3' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function koperasi()
    {
        return $this->belongsTo(\App\Models\Koperasi::class, 'koperasi_id');
    }
}
