<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anggota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_anggota' => $this->faker->word,
        'koperasi_id' => $this->faker->randomDigitNotNull,
        'kode_koperasi' => $this->faker->word,
        'nama_ktp' => $this->faker->word,
        'nomor_ktp' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tgl_lahir' => $this->faker->word,
        'alamat_ktp' => $this->faker->word,
        'alamat_desa_ktp' => $this->faker->word,
        'alamat_kec_ktp' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'status_dlm_keluarga' => $this->faker->word,
        'jml_anggota_keluarga' => $this->faker->randomDigitNotNull,
        'pendidikan_terakhir' => $this->faker->word,
        'pekerjaan_lain' => $this->faker->word,
        'lampiran_identitas' => $this->faker->word,
        'lampiran_foto_anggota' => $this->faker->word,
        'status_anggota' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
