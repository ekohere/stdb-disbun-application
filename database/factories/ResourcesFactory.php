<?php

namespace Database\Factories;

use App\Models\Resources;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resources::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text,
        'package_id' => $this->faker->word,
        'description' => $this->faker->text,
        'format' => $this->faker->word,
        'year' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
