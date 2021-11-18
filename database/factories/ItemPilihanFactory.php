<?php

namespace Database\Factories;

use App\Models\ItemPilihan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPilihanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemPilihan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'information' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'syarat_pelayanan_id' => $this->faker->word
        ];
    }
}
