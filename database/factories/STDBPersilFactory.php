<?php

namespace Database\Factories;

use App\Models\STDBPersil;
use Illuminate\Database\Eloquent\Factories\Factory;

class STDBPersilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = STDBPersil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->word,
        'status_lahan' => $this->faker->word,
        'no_surat_lahan' => $this->faker->word,
        'jenis_tanaman' => $this->faker->word,
        'luas_lahan_tanam_telah_produksi' => $this->faker->randomDigitNotNull,
        'luas_lahan_tanam_belum_produksi' => $this->faker->randomDigitNotNull,
        'luas_lahan_belum_tanam' => $this->faker->randomDigitNotNull,
        'rata_panen_bulan' => $this->faker->randomDigitNotNull,
        'rata_panen_tahun' => $this->faker->randomDigitNotNull,
        'total_produksi_setahun' => $this->faker->randomDigitNotNull,
        'rata_produksi_dalam_panen' => $this->faker->randomDigitNotNull,
        'produktifitas_lahan' => $this->faker->randomDigitNotNull,
        'rata_harga_jual_tbs' => $this->faker->randomDigitNotNull,
        'total_penjualan_tbs_tahun' => $this->faker->randomDigitNotNull,
        'rata_umur_tanaman' => $this->faker->word,
        'bulan_tanam' => $this->faker->word,
        'tahun_tanam' => $this->faker->word,
        'jml_pohon' => $this->faker->randomDigitNotNull,
        'pola_tanam' => $this->faker->word,
        'lahan_gambut_or_non' => $this->faker->word,
        'topografi' => $this->faker->word,
        'metode_bukaan_lahan' => $this->faker->word,
        'asal_benih' => $this->faker->word,
        'jenis_pupuk' => $this->faker->word,
        'mitra_pengolahan' => $this->faker->word,
        'pupuk_tambah_upah' => $this->faker->randomDigitNotNull,
        'pestisida_tambah_upah' => $this->faker->randomDigitNotNull,
        'pembersihan_tambah_upah' => $this->faker->randomDigitNotNull,
        'panen_tambah_upah' => $this->faker->randomDigitNotNull,
        'biaya_lain' => $this->faker->randomDigitNotNull,
        'total_biaya_produksi' => $this->faker->randomDigitNotNull,
        'apakah_kesulitan_menjual' => $this->faker->word,
        'jenis_kesulitan' => $this->faker->word,
        'kesulitan_lainnya' => $this->faker->word,
        'penentuan_harga_jual' => $this->faker->word,
        'lahan_yg_perlu_diremajakan' => $this->faker->word,
        'luas_peremajaan' => $this->faker->word,
        'bentuk_skema_peremajaan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
