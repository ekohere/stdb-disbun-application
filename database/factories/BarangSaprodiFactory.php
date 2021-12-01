<?php

namespace Database\Factories;

use App\Models\BarangSaprodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangSaprodiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BarangSaprodi::class;

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
        'jenis_barang_saprodi_id' => $this->faker->randomDigitNotNull,
        'kode_jenis_barang_saprodi' => $this->faker->word,
        'nama_saprodi' => $this->faker->word,
        'satuan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
