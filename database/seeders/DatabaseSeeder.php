<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@laundry.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // 2. Akun Kasir
        User::create([
            'name' => 'Kasir Laundry',
            'email' => 'kasir@laundry.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        // 3. Data Layanan Awal sesuai soal
        Layanan::create([
            'nama_layanan' => 'Reguler',
            'harga' => 7000,
            'durasi' => '3-4 hari',
        ]);

        Layanan::create([
            'nama_layanan' => 'Ekspres',
            'harga' => 12000,
            'durasi' => '1-2 hari',
        ]);

        Layanan::create([
            'nama_layanan' => 'Superkilat',
            'harga' => 25000,
            'durasi' => '5 jam selesai',
        ]);
    }
}