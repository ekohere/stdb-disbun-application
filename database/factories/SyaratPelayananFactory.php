<?php

namespace Database\Factories;

use App\Models\SyaratPelayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class SyaratPelayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SyaratPelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'tipe_syarat_id' => $this->faker->word,
        'information' => $this->faker->text,
        'required' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'pelayanan_id' => $this->faker->word,
        'file_download_id' => $this->faker->word
        ];
    }
}
