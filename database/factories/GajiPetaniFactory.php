<?php

namespace Database\Factories;

use App\Models\GajiPetani;
use Illuminate\Database\Eloquent\Factories\Factory;

class GajiPetaniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GajiPetani::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'koperasi_id' => $this->faker->randomDigitNotNull,
        'kode_koperasi' => $this->faker->word,
        'anggota_id' => $this->faker->word,
        'kode_anggota' => $this->faker->word,
        'tipe_fee_koperasi' => $this->faker->word,
        'pot_koperasi' => $this->faker->randomDigitNotNull,
        'pot_transport' => $this->faker->randomDigitNotNull,
        'pot_admin' => $this->faker->randomDigitNotNull,
        'pot_biaya_timbang' => $this->faker->randomDigitNotNull,
        'pot_langsir' => $this->faker->randomDigitNotNull,
        'pot_kredit_saprodi' => $this->faker->randomDigitNotNull,
        'pot_perawatan_jalan' => $this->faker->randomDigitNotNull,
        'pot_iuran_wajib' => $this->faker->randomDigitNotNull,
        'pot_pinjaman_koperasi' => $this->faker->randomDigitNotNull,
        'pot_pupuk_induk' => $this->faker->randomDigitNotNull,
        'pot_pinjaman_bank' => $this->faker->randomDigitNotNull,
        'pot_zakat' => $this->faker->randomDigitNotNull,
        'pot_infaq' => $this->faker->randomDigitNotNull,
        'metode_pembayaran' => $this->faker->word,
        'status_bayar' => $this->faker->randomDigitNotNull,
        'tgl_bayar' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
