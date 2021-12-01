<?php

namespace Database\Factories;

use App\Models\Aset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aset::class;

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
        'nomor' => $this->faker->word,
        'nama' => $this->faker->word,
        'tahun' => $this->faker->word,
        'nilai_awal' => $this->faker->randomDigitNotNull,
        'nilai_akhir' => $this->faker->randomDigitNotNull,
        'kondisi' => $this->faker->word,
        'foto' => $this->faker->word,
        'pemakai' => $this->faker->word,
        'keterangan' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
