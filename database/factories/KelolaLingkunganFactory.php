<?php

namespace Database\Factories;

use App\Models\KelolaLingkungan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelolaLingkunganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KelolaLingkungan::class;

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
        'persil_id' => $this->faker->word,
        'petak_id' => $this->faker->word,
        'nama_pekebun' => $this->faker->word,
        'tgl_kelola' => $this->faker->word,
        'kegiatan' => $this->faker->text,
        'org_terlibat' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
