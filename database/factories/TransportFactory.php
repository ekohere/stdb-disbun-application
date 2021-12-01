<?php

namespace Database\Factories;

use App\Models\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transport::class;

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
        'nama_pemilik' => $this->faker->word,
        'alamat_pemilik' => $this->faker->text,
        'kapasitas' => $this->faker->word,
        'nomor_plat' => $this->faker->word,
        'kode_transport' => $this->faker->word,
        'lampiran_stnk' => $this->faker->word,
        'lampiran_lainnya' => $this->faker->word,
        'ket' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
