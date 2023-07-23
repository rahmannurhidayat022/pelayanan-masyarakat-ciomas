<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    protected $model = KartuKeluarga::class;

    public function definition()
    {
        return [
            'kepala_keluarga' => $this->faker->name,
            'no_kk' => $this->faker->unique()->numerify('################'),
            'alamat' => $this->faker->address,
            'rt_rw' => $this->faker->numerify('###/###'),
            'desa' => $this->faker->city,
            'kecamatan' => $this->faker->city,
            'kabupaten' => $this->faker->city,
            'kode_pos' => $this->faker->postcode,
            'provinsi' => $this->faker->state,
        ];
    }
}
