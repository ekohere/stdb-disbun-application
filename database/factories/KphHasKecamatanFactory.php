<?php

namespace Database\Factories;

use App\Models\KphHasKecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KphHasKecamatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KphHasKecamatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kecamatan_id' => $this->faker->randomDigitNotNull
        ];
    }
}
