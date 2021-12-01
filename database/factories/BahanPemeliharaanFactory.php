<?php

namespace Database\Factories;

use App\Models\BahanPemeliharaan;
use Illuminate\Database\Eloquent\Factories\Factory;

class BahanPemeliharaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BahanPemeliharaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori_bahan_pemeliharaan_id' => $this->faker->randomDigitNotNull,
        'koperasi_id' => $this->faker->randomDigitNotNull,
        'kode_koperasi' => $this->faker->word,
        'nama_bahan' => $this->faker->word,
        'satuan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
