<?php

namespace App\Repositories;

use App\Models\STDBPersil;
use App\Repositories\BaseRepository;

/**
 * Class STDBPersilRepository
 * @package App\Repositories
 * @version December 10, 2021, 1:26 pm UTC
*/

class STDBPersilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
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
        'bentuk_skema_peremajaan'
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
        return STDBPersil::class;
    }
}
