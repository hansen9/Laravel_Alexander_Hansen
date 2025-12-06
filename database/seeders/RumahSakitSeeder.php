<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rumah_sakit')->insert([
            [
                'namaRS' => 'Rumah Sakit Pusat Medika',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta Pusat',
                'email' => 'info@pusatmedika.com',
                'tlp' => '(021) 123-4567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaRS' => 'Rumah Sakit Bersama Sejahtera',
                'alamat' => 'Jl. Sudirman No. 456, Bandung',
                'email' => 'contact@bersama-sejahtera.com',
                'tlp' => '(022) 234-5678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaRS' => 'Rumah Sakit Harapan Sehat',
                'alamat' => 'Jl. Ahmad Yani No. 789, Surabaya',
                'email' => 'hello@harapansehat.com',
                'tlp' => '(031) 345-6789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
