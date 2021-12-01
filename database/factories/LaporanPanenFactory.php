<?php

namespace Database\Factories;

use App\Models\LaporanPanen;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanPanenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaporanPanen::class;

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
        'persil_id' => $this->faker->word,
        'pekerja_id' => $this->faker->word,
        'kode_panen' => $this->faker->word,
        'nomor_persil' => $this->faker->randomDigitNotNull,
        'tgl_panen' => $this->faker->word,
        'luas' => $this->faker->randomDigitNotNull,
        'rotasi' => $this->faker->randomDigitNotNull,
        'hk' => $this->faker->randomDigitNotNull,
        'jml_jjg' => $this->faker->word,
        'berat_brondol' => $this->faker->randomDigitNotNull,
        'berat_kirim' => $this->faker->randomDigitNotNull,
        'keterangan' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
