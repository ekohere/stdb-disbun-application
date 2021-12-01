<?php

namespace Database\Factories;

use App\Models\GajiKaryawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class GajiKaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GajiKaryawan::class;

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
        'periode_bulan' => $this->faker->randomDigitNotNull,
        'periode_tahun' => $this->faker->word,
        'karyawan_id' => $this->faker->randomDigitNotNull,
        'gaji_pokok' => $this->faker->randomDigitNotNull,
        'tj_jabatan' => $this->faker->randomDigitNotNull,
        'tj_konsumsi' => $this->faker->randomDigitNotNull,
        'tj_harian' => $this->faker->randomDigitNotNull,
        'bonus_target_lembur' => $this->faker->randomDigitNotNull,
        'potongan_pph_21' => $this->faker->randomDigitNotNull,
        'potongan_asuransi' => $this->faker->randomDigitNotNull,
        'potongan_bulan_lalu' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->word,
        'updated_at' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
