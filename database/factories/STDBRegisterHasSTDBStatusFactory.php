<?php

namespace Database\Factories;

use App\Models\STDBRegisterHasSTDBStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class STDBRegisterHasSTDBStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = STDBRegisterHasSTDBStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stdb_status_id' => $this->faker->randomDigitNotNull,
        'message' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
