<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jalankan seeder lainnya di sini
        $this->call([
            UserRoleSeeder::class, // pastikan kamu sudah buat seeder ini
        ]);
    }
}
