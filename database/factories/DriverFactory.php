<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

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
        'kode_sopir' => $this->faker->word,
        'nama_driver' => $this->faker->word,
        'lampiran_sim' => $this->faker->word,
        'hp' => $this->faker->word,
        'alamat' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
