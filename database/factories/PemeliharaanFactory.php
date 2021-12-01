<?php

namespace Database\Factories;

use App\Models\Pemeliharaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PemeliharaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pemeliharaan::class;

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
        'kode_persil' => $this->faker->word,
        'persil_id' => $this->faker->word,
        'kategori_pemeliharaan_id' => $this->faker->randomDigitNotNull,
        'luas_lahan' => $this->faker->word,
        'tgl_pelaksanaan' => $this->faker->word,
        'jml_luas_dikerjakan' => $this->faker->word,
        'rotasi' => $this->faker->randomDigitNotNull,
        'hk' => $this->faker->randomDigitNotNull,
        'nilai_pekerja' => $this->faker->randomDigitNotNull,
        'jml_transport' => $this->faker->randomDigitNotNull,
        'cara_aplikasi' => $this->faker->word,
        'mengunakan_apd' => $this->faker->word,
        'ket' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
