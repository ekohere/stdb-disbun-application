<?php

namespace Database\Factories;

use App\Models\PenjualanTbs;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanTbsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PenjualanTbs::class;

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
        'panen_id' => $this->faker->word,
        'spb_id' => $this->faker->word,
        'tgl_penjualan' => $this->faker->word,
        'pot_susut' => $this->faker->word,
        'pot_sortasi' => $this->faker->randomDigitNotNull,
        'harga_tbs' => $this->faker->randomDigitNotNull,
        'keterangan' => $this->faker->word,
        'file_upload' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
