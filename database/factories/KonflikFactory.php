<?php

namespace Database\Factories;

use App\Models\Konflik;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonflikFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Konflik::class;

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
        'persil_id' => $this->faker->word,
        'tgl_konflik' => $this->faker->word,
        'pihak_terlibat' => $this->faker->word,
        'jenis_konflik' => $this->faker->word,
        'deskripsi_singkat' => $this->faker->text,
        'penyelesaian' => $this->faker->text,
        'keterangan' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
