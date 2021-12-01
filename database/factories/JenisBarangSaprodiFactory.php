<?php

namespace Database\Factories;

use App\Models\JenisBarangSaprodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisBarangSaprodiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisBarangSaprodi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_jenis_barang_saprodi' => $this->faker->word,
        'jenis_barang_saprodi' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
