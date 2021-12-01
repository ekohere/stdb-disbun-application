<?php

namespace Database\Factories;

use App\Models\PembelianBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembelianBarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PembelianBarang::class;

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
        'jenis_barang_id' => $this->faker->randomDigitNotNull,
        'tgl_order' => $this->faker->word,
        'nomor_order' => $this->faker->word,
        'nomor_invoice' => $this->faker->word,
        'mata_uang' => $this->faker->word,
        'file_invoice' => $this->faker->word,
        'pemasok' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
