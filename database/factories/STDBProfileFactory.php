<?php

namespace Database\Factories;

use App\Models\STDBProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class STDBProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = STDBProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tgl_lahir' => $this->faker->word,
        'no_ktp' => $this->faker->word,
        'alamat' => $this->faker->text,
        'kecamatan' => $this->faker->word,
        'desa' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'status_dlm_keluarga' => $this->faker->word,
        'jml_anggota_keluarga' => $this->faker->randomDigitNotNull,
        'pendidikan_terakhir' => $this->faker->word,
        'pekerjaan_lain' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
