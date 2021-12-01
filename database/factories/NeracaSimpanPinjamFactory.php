<?php

namespace Database\Factories;

use App\Models\NeracaSimpanPinjam;
use Illuminate\Database\Eloquent\Factories\Factory;

class NeracaSimpanPinjamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NeracaSimpanPinjam::class;

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
        'periode' => $this->faker->word,
        'jml_kas' => $this->faker->randomDigitNotNull,
        'piutang_tahun' => $this->faker->word,
        'jml_piutang_tahun' => $this->faker->randomDigitNotNull,
        'simpanan_pokok' => $this->faker->randomDigitNotNull,
        'simpanan_wajib' => $this->faker->randomDigitNotNull,
        'laba' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
