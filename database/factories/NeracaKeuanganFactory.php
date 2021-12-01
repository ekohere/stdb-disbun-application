<?php

namespace Database\Factories;

use App\Models\NeracaKeuangan;
use Illuminate\Database\Eloquent\Factories\Factory;

class NeracaKeuanganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NeracaKeuangan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_koperasi' => $this->faker->word,
        'koperasi_id' => $this->faker->randomDigitNotNull,
        'periode' => $this->faker->word,
        'kas_saprodi' => $this->faker->randomDigitNotNull,
        'kas_replanting' => $this->faker->randomDigitNotNull,
        'piutang_saprodi' => $this->faker->randomDigitNotNull,
        'piutang_simpin' => $this->faker->randomDigitNotNull,
        'stok_barang' => $this->faker->randomDigitNotNull,
        'potongan_admin' => $this->faker->randomDigitNotNull,
        'fee_pengelolaan_penjualan_tbs' => $this->faker->randomDigitNotNull,
        'ht_tanah' => $this->faker->randomDigitNotNull,
        'ht_bangunan_non_permanen' => $this->faker->randomDigitNotNull,
        'simpanan_pokok' => $this->faker->randomDigitNotNull,
        'simpanan_wajib' => $this->faker->randomDigitNotNull,
        'modal_tanah' => $this->faker->randomDigitNotNull,
        'modal_bangunan' => $this->faker->randomDigitNotNull,
        'modal_saprodi' => $this->faker->randomDigitNotNull,
        'biaya_bangun_kantor' => $this->faker->randomDigitNotNull,
        'biaya_atk_dan_konsumsi' => $this->faker->randomDigitNotNull,
        'biaya_rat' => $this->faker->randomDigitNotNull,
        'gaji' => $this->faker->randomDigitNotNull,
        'laba_simpin' => $this->faker->randomDigitNotNull,
        'laba_saprodi' => $this->faker->randomDigitNotNull,
        'laba_harta_tetap' => $this->faker->randomDigitNotNull,
        'pajak_saprodi' => $this->faker->randomDigitNotNull,
        'kas_admin' => $this->faker->randomDigitNotNull,
        'biaya_lain_1' => $this->faker->randomDigitNotNull,
        'biaya_lain_2' => $this->faker->randomDigitNotNull,
        'biaya_lain_3' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
