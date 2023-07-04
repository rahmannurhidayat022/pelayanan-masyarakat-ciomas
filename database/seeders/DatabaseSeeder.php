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
    }
}
