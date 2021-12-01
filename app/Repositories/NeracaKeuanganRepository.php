<?php

namespace App\Repositories;

use App\Models\NeracaKeuangan;
use App\Repositories\BaseRepository;

/**
 * Class NeracaKeuanganRepository
 * @package App\Repositories
 * @version December 1, 2021, 3:47 am UTC
*/

class NeracaKeuanganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return NeracaKeuangan::class;
    }
}
