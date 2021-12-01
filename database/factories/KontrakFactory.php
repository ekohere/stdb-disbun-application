<?php

namespace Database\Factories;

use App\Models\Kontrak;
use Illuminate\Database\Eloquent\Factories\Factory;

class KontrakFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kontrak::class;

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
        'pks_id' => $this->faker->randomDigitNotNull,
        'harga_id' => $this->faker->word,
        'nomor_kontrak' => $this->faker->word,
        'tgl_kontrak' => $this->faker->word,
        'periode_kontrak' => $this->faker->word,
        'volume' => $this->faker->randomDigitNotNull,
        'harga_aktual' => $this->faker->randomDigitNotNull,
        'file_kontrak' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
