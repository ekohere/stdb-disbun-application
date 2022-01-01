<?php

namespace Database\Factories;

use App\Models\STDBDetailRegister;
use Illuminate\Database\Eloquent\Factories\Factory;

class STDBDetailRegisterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = STDBDetailRegister::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stdb_register_id' => $this->faker->randomDigitNotNull,
        'stdb_persil_id' => $this->faker->randomDigitNotNull,
        'persil_id' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
