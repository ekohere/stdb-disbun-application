<?php

namespace Database\Factories;

use App\Models\Koperasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KoperasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Koperasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_kec' => $this->faker->word,
        'kode_koperasi' => $this->faker->word,
        'nama_koperasi' => $this->faker->word,
        'alamat' => $this->faker->word,
        'telepon' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
