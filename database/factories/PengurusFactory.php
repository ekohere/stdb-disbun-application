<?php

namespace Database\Factories;

use App\Models\Pengurus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengurusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pengurus::class;

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
        'nama' => $this->faker->word,
        'golongan' => $this->faker->word,
        'jabatan' => $this->faker->word,
        'nik' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tgl_lahir' => $this->faker->word,
        'alamat' => $this->faker->text,
        'tgl_masuk' => $this->faker->word,
        'tgl_keluar' => $this->faker->word,
        'status_kawin' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
