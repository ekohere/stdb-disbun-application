<?php

namespace Database\Factories;

use App\Models\Pelatihan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PelatihanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelatihan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_koperasi' => $this->faker->word,
        'koperasi_id' => $this->faker->randomDigitNotNull,
        'topik' => $this->faker->word,
        'tgl' => $this->faker->word,
        'file_dok' => $this->faker->word,
        'jml_peserta' => $this->faker->randomDigitNotNull,
        'pelaksana' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
