<?php

namespace Database\Factories;

use App\Models\Spb;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpbFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Spb::class;

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
        'no_spb' => $this->faker->word,
        'tgl_spb' => $this->faker->word,
        'transport_id' => $this->faker->randomDigitNotNull,
        'driver_id' => $this->faker->randomDigitNotNull,
        'pks_tujuan' => $this->faker->randomDigitNotNull,
        'penerima' => $this->faker->word,
        'pengangkut' => $this->faker->word,
        'pengirim' => $this->faker->word,
        'jab_pengirim' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
