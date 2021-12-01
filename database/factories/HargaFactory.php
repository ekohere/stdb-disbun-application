<?php

namespace Database\Factories;

use App\Models\Harga;
use Illuminate\Database\Eloquent\Factories\Factory;

class HargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Harga::class;

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
        'bulan' => $this->faker->randomDigitNotNull,
        'tahun' => $this->faker->word,
        'harga3' => $this->faker->word,
        'harga4' => $this->faker->word,
        'harga5' => $this->faker->word,
        'harga6' => $this->faker->word,
        'harga7' => $this->faker->word,
        'harga8' => $this->faker->word,
        'harga9' => $this->faker->word,
        'harga10' => $this->faker->word,
        'keterangan' => $this->faker->word,
        'nomor_sk_gub' => $this->faker->word,
        'tgl_sk_gub' => $this->faker->word,
        'file_sk_gub' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
