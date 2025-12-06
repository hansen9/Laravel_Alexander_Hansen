<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasien')->insert([
            [
                'namaPasien' => 'Budi Santoso',
                'alamat' => 'Jl. Kenari No. 12, Jakarta Timur',
                'noTlp' => '08123-4567-890',
                'RSID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPasien' => 'Siti Nurhaliza',
                'alamat' => 'Jl. Flamboyan No. 45, Bandung',
                'noTlp' => '08234-5678-901',
                'RSID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPasien' => 'Ahmad Wijaya',
                'alamat' => 'Jl. Melati No. 78, Surabaya',
                'noTlp' => '08345-6789-012',
                'RSID' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPasien' => 'Dewi Lestari',
                'alamat' => 'Jl. Dahlia No. 34, Jakarta Pusat',
                'noTlp' => '08456-7890-123',
                'RSID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'namaPasien' => 'Rudi Hartono',
                'alamat' => 'Jl. Anggrek No. 56, Bandung',
                'noTlp' => '08567-8901-234',
                'RSID' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
