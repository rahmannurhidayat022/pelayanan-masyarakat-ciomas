<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin Desa',
            'role' => 'admin',
            'username' => 'admin',
            'password' => 'admin123',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Pengunjung',
            'role' => 'viewer',
            'username' => 'viewer',
            'password' => 'viewer123',
        ]);
        // \App\Models\AnggotaKeluarga::factory()->create([
        //     'kk_id' => \App\Models\KartuKeluarga::factory()->create([
        //         'kepala_keluarga' => 'Edi Suhandi',
        //         'no_kk' => '1000230082912',
        //         'alamat' => 'Bandung',
        //         'rt_rw' => '012/010',
        //         'desa' => 'Kebonjayanti',
        //         'kecamatan' => 'KiaraCondong',
        //         'kabupaten' => 'Kota Bandung',
        //         'kode_pos' => '45443',
        //         'provinsi' => 'Jawa Barat',
        //     ]),
        //     'nik' => '20012378729101',
        //     'nama' => 'Mulyadi',
        //     'jenis_kelamin' => 'laki-laki',
        //     'tempat_lahir' => 'Bandung',
        //     'tanggal_lahir' => '2001-07-12',
        //     'agama' => 'Islam',
        //     'pendidikan' => 'SD',
        //     'pekerjaan' => 'Wiraswasta',
        //     'status_pernikahan' => 'Belum menikah',
        //     'status_hubungan' => 'Anak',
        //     'kewarganegaraan' => 'WNI',
        //     'nama_ayah' => 'Edi Suhandi',
        //     'nama_ibu' => 'Emii'
        // ]);
    }
}
