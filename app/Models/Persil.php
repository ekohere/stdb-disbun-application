<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Persil
 * @package App\Models
 * @version November 30, 2021, 2:46 am UTC
 *
 * @property \App\Models\Anggotum $anggota
 * @property \App\Models\Koperasi $koperasi
 * @property \Illuminate\Database\Eloquent\Collection $kelolaLingkungans
 * @property \Illuminate\Database\Eloquent\Collection $konfliks
 * @property \Illuminate\Database\Eloquent\Collection $laporanPanens
 * @property \Illuminate\Database\Eloquent\Collection $pemeliharaans
 * @property \Illuminate\Database\Eloquent\Collection $persilPenjualanTbs
 * @property \Illuminate\Database\Eloquent\Collection $spbItems
 * @property string $kode_koperasi
 * @property integer $koperasi_id
 * @property string $kode_anggota
 * @property integer $anggota_id
 * @property string $kelompok_tani
 * @property string $kode_persil
 * @property integer $no_petak_peta
 * @property number $luas_lahan_peta
 * @property string $nama_peta
 * @property number $luas_lahan
 * @property string $status_lahan
 * @property string $nomor_surat_lahan
 * @property string $jenis_tanaman
 * @property integer $luas_lahan_tanam_telah_produksi
 * @property integer $luas_lahan_tanam_belum_produksi
 * @property integer $luas_lahan_belum_tanam
 * @property number $rata_panen_bulan
 * @property number $rata_panen_tahun
 * @property number $rata_produksi_dalam_panen
 * @property number $total_produksi_setahun
 * @property number $produktifitas_lahan
 * @property number $rata_harga_jual_tbs
 * @property number $total_penjualan_tbs_tahun
 * @property string $rata_umur_tanaman
 * @property string $bulan_tanam
 * @property string $tahun_tanam
 * @property integer $jml_pohon
 * @property string $pola_tanam
 * @property string $laham_gambut_or_non
 * @property string $topografi
 * @property string $metode_bukaan_lahan
 * @property string $asal_benih
 * @property number $pupuk_per_tahun
 * @property number $jml_benih_per_tahun
 * @property string $jenis_pupuk
 * @property string $jenis_pupuk_digunakan
 * @property string $mitra_pengolahan
 * @property number $pupuk_tambah_upah
 * @property number $pestisida_tambah_upah
 * @property string $pembersihan_tambah_upah
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
 * @property string $lampiran_shm
 * @property string $lampiran_identitas
 * @property string $lampiran_foto_anggota
 * @property string $geojson_persil
 */
class Persil extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'persil';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $appends = ['link_detail'];

    public $fillable = [
        'kode_koperasi',
        'koperasi_id',
        'kode_anggota',
        'anggota_id',
        'kelompok_tani',
        'kode_persil',
        'no_petak_peta',
        'luas_lahan_peta',
        'nama_peta',
        'luas_lahan',
        'status_lahan',
        'nomor_surat_lahan',
        'jenis_tanaman',
        'luas_lahan_tanam_telah_produksi',
        'luas_lahan_tanam_belum_produksi',
        'luas_lahan_belum_tanam',
        'rata_panen_bulan',
        'rata_panen_tahun',
        'rata_produksi_dalam_panen',
        'total_produksi_setahun',
        'produktifitas_lahan',
        'rata_harga_jual_tbs',
        'total_penjualan_tbs_tahun',
        'rata_umur_tanaman',
        'bulan_tanam',
        'tahun_tanam',
        'jml_pohon',
        'pola_tanam',
        'laham_gambut_or_non',
        'topografi',
        'metode_bukaan_lahan',
        'asal_benih',
        'pupuk_per_tahun',
        'jml_benih_per_tahun',
        'jenis_pupuk',
        'jenis_pupuk_digunakan',
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
        'lampiran_shm',
        'lampiran_identitas',
        'lampiran_foto_anggota',
        'geojson_persil',
        'polygon_persil_id'
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
        'kode_anggota' => 'string',
        'anggota_id' => 'integer',
        'kelompok_tani' => 'string',
        'kode_persil' => 'string',
        'no_petak_peta' => 'integer',
        'luas_lahan_peta' => 'decimal:2',
        'nama_peta' => 'string',
        'luas_lahan' => 'decimal:2',
        'status_lahan' => 'string',
        'nomor_surat_lahan' => 'string',
        'jenis_tanaman' => 'string',
        'luas_lahan_tanam_telah_produksi' => 'integer',
        'luas_lahan_tanam_belum_produksi' => 'integer',
        'luas_lahan_belum_tanam' => 'integer',
        'rata_panen_bulan' => 'float',
        'rata_panen_tahun' => 'float',
        'rata_produksi_dalam_panen' => 'decimal:2',
        'total_produksi_setahun' => 'decimal:2',
        'produktifitas_lahan' => 'decimal:2',
        'rata_harga_jual_tbs' => 'float',
        'total_penjualan_tbs_tahun' => 'float',
        'rata_umur_tanaman' => 'string',
        'bulan_tanam' => 'string',
        'tahun_tanam' => 'string',
        'jml_pohon' => 'integer',
        'pola_tanam' => 'string',
        'laham_gambut_or_non' => 'string',
        'topografi' => 'string',
        'metode_bukaan_lahan' => 'string',
        'asal_benih' => 'string',
        'pupuk_per_tahun' => 'float',
        'jml_benih_per_tahun' => 'float',
        'jenis_pupuk' => 'string',
        'jenis_pupuk_digunakan' => 'string',
        'mitra_pengolahan' => 'string',
        'pupuk_tambah_upah' => 'float',
        'pestisida_tambah_upah' => 'float',
        'pembersihan_tambah_upah' => 'string',
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
        'lampiran_shm' => 'string',
        'lampiran_identitas' => 'string',
        'lampiran_foto_anggota' => 'string',
        'geojson_persil' => 'string',
        'polygon_persil_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_koperasi' => 'required|string|max:50',
        'koperasi_id' => 'nullable|integer',
        'kode_anggota' => 'nullable|string|max:50',
        'anggota_id' => 'nullable',
        'kelompok_tani' => 'required|string|max:150',
        'kode_persil' => 'nullable|string|max:50',
        'no_petak_peta' => 'required|integer',
        'luas_lahan_peta' => 'required|numeric',
        'nama_peta' => 'required|string|max:150',
        'luas_lahan' => 'required|numeric',
        'status_lahan' => 'nullable|string|max:150',
        'nomor_surat_lahan' => 'nullable|string|max:50',
        'jenis_tanaman' => 'nullable|string|max:50',
        'luas_lahan_tanam_telah_produksi' => 'nullable|integer',
        'luas_lahan_tanam_belum_produksi' => 'nullable|integer',
        'luas_lahan_belum_tanam' => 'nullable|integer',
        'rata_panen_bulan' => 'nullable|numeric',
        'rata_panen_tahun' => 'nullable|numeric',
        'rata_produksi_dalam_panen' => 'nullable|numeric',
        'total_produksi_setahun' => 'nullable|numeric',
        'produktifitas_lahan' => 'nullable|numeric',
        'rata_harga_jual_tbs' => 'nullable|numeric',
        'total_penjualan_tbs_tahun' => 'nullable|numeric',
        'rata_umur_tanaman' => 'nullable|string|max:150',
        'bulan_tanam' => 'nullable|string|max:3',
        'tahun_tanam' => 'nullable|string|max:50',
        'jml_pohon' => 'nullable|integer',
        'pola_tanam' => 'nullable|string|max:150',
        'laham_gambut_or_non' => 'nullable|string|max:50',
        'topografi' => 'nullable|string|max:50',
        'metode_bukaan_lahan' => 'nullable|string|max:50',
        'asal_benih' => 'nullable|string|max:150',
        'pupuk_per_tahun' => 'nullable|numeric',
        'jml_benih_per_tahun' => 'nullable|numeric',
        'jenis_pupuk' => 'nullable|string|max:75',
        'jenis_pupuk_digunakan' => 'nullable|string|max:150',
        'mitra_pengolahan' => 'nullable|string|max:150',
        'pupuk_tambah_upah' => 'nullable|numeric',
        'pestisida_tambah_upah' => 'nullable|numeric',
        'pembersihan_tambah_upah' => 'nullable|string|max:50',
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
        'lampiran_shm' => 'nullable|string|max:250',
        'lampiran_identitas' => 'nullable|string|max:250',
        'lampiran_foto_anggota' => 'nullable|string|max:250',
        'geojson_persil' => 'nullable|string|max:250',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id');
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
    public function kelolaLingkungans()
    {
        return $this->hasMany(\App\Models\KelolaLingkungan::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function konfliks()
    {
        return $this->hasMany(\App\Models\Konflik::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function laporanPanens()
    {
        return $this->hasMany(\App\Models\LaporanPanen::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pemeliharaans()
    {
        return $this->hasMany(\App\Models\Pemeliharaan::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function persilPenjualanTbs()
    {
        return $this->hasMany(\App\Models\PersilPenjualanTb::class, 'persil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function spbItems()
    {
        return $this->hasMany(\App\Models\SpbItem::class, 'persil_id');
    }

    public function persilPolygon()
    {
        return $this->morphTo();
    }

    public function getLinkDetailAttribute()
        {
        return 'http://koperasi-sawit.kutaitimurkab.go.id/detail_persil/'.$this->id;
    }
}
