<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // Create Staff User
        User::create([
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);

        // Create sample inventaris data
        Inventaris::create([
            'nama' => 'Buku Panduan Laravel',
            'jumlah' => 10,
            'tanggal_masuk' => now()->subDays(30),
            'harga' => 50000,
        ]);

        Inventaris::create([
            'nama' => 'Komputer Desktop',
            'jumlah' => 5,
            'tanggal_masuk' => now()->subDays(60),
            'harga' => 5000000,
        ]);

        Inventaris::create([
            'nama' => 'Proyektor',
            'jumlah' => 2,
            'tanggal_masuk' => now()->subDays(90),
            'harga' => 3000000,
        ]);

        Inventaris::create([
            'nama' => 'Meja Kerja',
            'jumlah' => 20,
            'tanggal_masuk' => now()->subDays(120),
            'harga' => 500000,
        ]);

        Inventaris::create([
            'nama' => 'Laptop',
            'jumlah' => 3,
            'tanggal_masuk' => now()->subDays(15),
            'harga' => 8000000,
        ]);
    }
}
