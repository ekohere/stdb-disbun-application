<?php

namespace App\Repositories;

use App\Models\GajiPetani;
use App\Repositories\BaseRepository;

/**
 * Class GajiPetaniRepository
 * @package App\Repositories
 * @version November 30, 2021, 10:52 am UTC
*/

class GajiPetaniRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return GajiPetani::class;
    }
}
