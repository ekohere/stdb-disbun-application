<?php

namespace Database\Factories;

use App\Models\Pks;
use Illuminate\Database\Eloquent\Factories\Factory;

class PksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pks::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_perusahaan' => $this->faker->word,
        'mill_name' => $this->faker->word,
        'group_perusahaan' => $this->faker->word,
        'alamat_pabrik' => $this->faker->word,
        'koordinat_x' => $this->faker->word,
        'koordinat_y' => $this->faker->word,
        'kapasitas_terpasang' => $this->faker->randomDigitNotNull,
        'kapasitas_olah' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
