<?php

namespace Database\Factories;

use App\Models\PenjualanSaprodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanSaprodiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PenjualanSaprodi::class;

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
        'kode_anggota' => $this->faker->word,
        'anggota_id' => $this->faker->word,
        'tanggal' => $this->faker->word,
        'no_nota' => $this->faker->word,
        'pembiayaan' => $this->faker->word,
        'ket' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
