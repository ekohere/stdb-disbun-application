<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karyawan::class;

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
        'kategori_pekerja_id' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'jabatan' => $this->faker->word,
        'kategori_pekerja' => $this->faker->word,
        'golongan_status' => $this->faker->word,
        'nik' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tgl_lahir' => $this->faker->word,
        'alamat' => $this->faker->text,
        'tgl_masuk' => $this->faker->word,
        'tgl_keluar' => $this->faker->word,
        'status_kawin' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'status' => $this->faker->word,
        'file_sk' => $this->faker->word,
        'lampiran_lainnya' => $this->faker->word,
        'riwayat_pekerjaan' => $this->faker->text,
        'gaji_pokok' => $this->faker->randomDigitNotNull,
        'tj_jabatan' => $this->faker->randomDigitNotNull,
        'tj_konsumsi' => $this->faker->randomDigitNotNull,
        'tj_harian' => $this->faker->randomDigitNotNull,
        'bonus_target_lembur' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
