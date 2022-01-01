<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class STDBPersil
 * @package App\Models
 * @version December 10, 2021, 1:26 pm UTC
 *
 * @property \App\Models\User $users
 * @property \Illuminate\Database\Eloquent\Collection $stdbDetailRegis
 * @property integer $users_id
 * @property string $status_lahan
 * @property string $no_surat_lahan
 * @property string $jenis_tanaman
 * @property number $luas_lahan_tanam_telah_produksi
 * @property number $luas_lahan_tanam_belum_produksi
 * @property number $luas_lahan_belum_tanam
 * @property number $rata_panen_bulan
 * @property number $rata_panen_tahun
 * @property number $total_produksi_setahun
 * @property number $rata_produksi_dalam_panen
 * @property number $produktifitas_lahan
 * @property number $rata_harga_jual_tbs
 * @property number $total_penjualan_tbs_tahun
 * @property string $rata_umur_tanaman
 * @property string $bulan_tanam
 * @property string $tahun_tanam
 * @property integer $jml_pohon
 * @property string $pola_tanam
 * @property string $lahan_gambut_or_non
 * @property string $topografi
 * @property string $metode_bukaan_lahan
 * @property string $asal_benih
 * @property string $jenis_pupuk
 * @property string $mitra_pengolahan
 * @property number $pupuk_tambah_upah
 * @property number $pestisida_tambah_upah
 * @property number $pembersihan_tambah_upah
 * @property number $panen_tambah_upah
 * @property number $biaya_lain
 * @property number $total_biaya_produksi
 * @property string $apakah_kesulitan_menjual
 * @property string $jenis_kesulitan
 * @property string $kesulitan_lainnya
 * @property string $penentuan_harga_jual
 * @property string $lahan_yg_perlu_diremajakan
 * @property number $luas_peremajaan
 * @property string $bentuk_skema_peremajaan
 */
class STDBPersil extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stdb_persil';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'users_id',
        'no_petak_peta',
        'luas_lahan_peta',
        'nama_peta',
        'luas_lahan',
        'status_lahan',
        'no_surat_lahan',
        'jenis_tanaman',
        'luas_lahan_tanam_telah_produksi',
        'luas_lahan_tanam_belum_produksi',
        'luas_lahan_belum_tanam',
        'rata_panen_bulan',
        'rata_panen_tahun',
        'total_produksi_setahun',
        'rata_produksi_dalam_panen',
        'produktifitas_lahan',
        'rata_harga_jual_tbs',
        'total_penjualan_tbs_tahun',
        'rata_umur_tanaman',
        'bulan_tanam',
        'tahun_tanam',
        'jml_pohon',
        'pola_tanam',
        'lahan_gambut_or_non',
        'topografi',
        'metode_bukaan_lahan',
        'asal_benih',
        'jenis_pupuk',
        'mitra_pengolahan',
        'pupuk_tambah_upah',
        'pestisida_tambah_upah',
        'pembersihan_tambah_upah',
        'panen_tambah_upah',
        'biaya_lain',
        'total_biaya_produksi',
        'apakah_kesulitan_menjual',
        'jenis_kesulitan',
        'kesulitan_lainnya',
        'penentuan_harga_jual',
        'lahan_yg_perlu_diremajakan',
        'luas_peremajaan',
        'bentuk_skema_peremajaan',
        'polygon_persil_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'users_id' => 'integer',
        'no_petak_peta' => 'integer',
        'luas_lahan_peta' => 'decimal:2',
        'nama_peta' => 'string',
        'luas_lahan' => 'decimal:2',
        'status_lahan' => 'string',
        'no_surat_lahan' => 'string',
        'jenis_tanaman' => 'string',
        'luas_lahan_tanam_telah_produksi' => 'float',
        'luas_lahan_tanam_belum_produksi' => 'float',
        'luas_lahan_belum_tanam' => 'float',
        'rata_panen_bulan' => 'float',
        'rata_panen_tahun' => 'float',
        'total_produksi_setahun' => 'float',
        'rata_produksi_dalam_panen' => 'float',
        'produktifitas_lahan' => 'float',
        'rata_harga_jual_tbs' => 'float',
        'total_penjualan_tbs_tahun' => 'float',
        'rata_umur_tanaman' => 'string',
        'bulan_tanam' => 'string',
        'tahun_tanam' => 'string',
        'jml_pohon' => 'integer',
        'pola_tanam' => 'string',
        'lahan_gambut_or_non' => 'string',
        'topografi' => 'string',
        'metode_bukaan_lahan' => 'string',
        'asal_benih' => 'string',
        'jenis_pupuk' => 'string',
        'mitra_pengolahan' => 'string',
        'pupuk_tambah_upah' => 'float',
        'pestisida_tambah_upah' => 'float',
        'pembersihan_tambah_upah' => 'float',
        'panen_tambah_upah' => 'float',
        'biaya_lain' => 'float',
        'total_biaya_produksi' => 'float',
        'apakah_kesulitan_menjual' => 'string',
        'jenis_kesulitan' => 'string',
        'kesulitan_lainnya' => 'string',
        'penentuan_harga_jual' => 'string',
        'lahan_yg_perlu_diremajakan' => 'string',
        'luas_peremajaan' => 'decimal:2',
        'bentuk_skema_peremajaan' => 'string',
        'polygon_persil_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'users_id' => 'required',
        'no_petak_peta' => 'nullable|integer',
        'luas_lahan_peta' => 'nullable|numeric',
        'nama_peta' => 'nullable|string|max:150',
        'luas_lahan' => 'nullable|numeric',
        'status_lahan' => 'nullable|string|max:255',
        'no_surat_lahan' => 'nullable|string|max:255',
        'jenis_tanaman' => 'nullable|string|max:255',
        'luas_lahan_tanam_telah_produksi' => 'nullable|numeric',
        'luas_lahan_tanam_belum_produksi' => 'nullable|numeric',
        'luas_lahan_belum_tanam' => 'nullable|numeric',
        'rata_panen_bulan' => 'nullable|numeric',
        'rata_panen_tahun' => 'nullable|numeric',
        'total_produksi_setahun' => 'nullable|numeric',
        'rata_produksi_dalam_panen' => 'nullable|numeric',
        'produktifitas_lahan' => 'nullable|numeric',
        'rata_harga_jual_tbs' => 'nullable|numeric',
        'total_penjualan_tbs_tahun' => 'nullable|numeric',
        'rata_umur_tanaman' => 'nullable|string|max:255',
        'bulan_tanam' => 'nullable|string|max:3',
        'tahun_tanam' => 'nullable|string|max:50',
        'jml_pohon' => 'nullable|integer',
        'pola_tanam' => 'nullable|string|max:255',
        'lahan_gambut_or_non' => 'nullable|string|max:255',
        'topografi' => 'nullable|string|max:255',
        'metode_bukaan_lahan' => 'nullable|string|max:255',
        'asal_benih' => 'nullable|string|max:255',
        'jenis_pupuk' => 'nullable|string|max:255',
        'mitra_pengolahan' => 'nullable|string|max:255',
        'pupuk_tambah_upah' => 'nullable|numeric',
        'pestisida_tambah_upah' => 'nullable|numeric',
        'pembersihan_tambah_upah' => 'nullable|numeric',
        'panen_tambah_upah' => 'nullable|numeric',
        'biaya_lain' => 'nullable|numeric',
        'total_biaya_produksi' => 'nullable|numeric',
        'apakah_kesulitan_menjual' => 'nullable|string|max:25',
        'jenis_kesulitan' => 'nullable|string|max:150',
        'kesulitan_lainnya' => 'nullable|string|max:150',
        'penentuan_harga_jual' => 'nullable|string|max:150',
        'lahan_yg_perlu_diremajakan' => 'nullable|string|max:50',
        'luas_peremajaan' => 'nullable|numeric',
        'bentuk_skema_peremajaan' => 'nullable|string|max:150',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function stdbDetailRegis()
    {
        return $this->hasMany(\App\Models\StdbDetailRegi::class, 'stdb_persil_id');
    }

    public function geo()
    {
        return $this->morphTo();
    }
}
