<?php

namespace App\Repositories;

use App\Models\Persil;
use App\Repositories\BaseRepository;

/**
 * Class PersilRepository
 * @package App\Repositories
 * @version November 30, 2021, 2:46 am UTC
*/

class PersilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'geojson_persil'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Persil::class;
    }
}
