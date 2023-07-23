<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnggotaKeluarga>
 */
class AnggotaKeluargaFactory extends Factory
{
    protected $model = AnggotaKeluarga::class;

    public function definition()
    {
        return [
            'kk_id' => function () {
                return \App\Models\KartuKeluarga::factory()->create()->id;
            },
            'nik' => $this->faker->unique()->numerify('################'),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle,
            'status_pernikahan' => $this->faker->randomElement(['Belum menikah', 'Menikah', 'Cerai']),
            'status_hubungan' => $this->faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak']),
            'kewarganegaraan' => $this->faker->randomElement(['WNI', 'WNA']),
            'nama_ayah' => $this->faker->name('male'),
            'nama_ibu' => $this->faker->name('female'),
        ];
    }
}
