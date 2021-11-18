<?php

namespace Database\Factories;

use App\Models\WilayahPelayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class WilayahPelayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WilayahPelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'wilayah_id' => $this->faker->word,
        'pelayanan_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
