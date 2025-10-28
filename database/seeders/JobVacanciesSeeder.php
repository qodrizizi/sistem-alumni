<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobVacanciesSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('job_vacancies')->insert([
                'user_id' => $i,
                'perusahaan' => "PT Maju Bersama $i",
                'posisi' => "Posisi Pekerjaan $i",
                'lokasi' => "Jakarta",
                'gaji' => "Rp 5.000.000",
                'tipe_pekerjaan' => 'Full-time',
                'kualifikasi' => "Minimal S1",
                'deskripsi' => "Lowongan pekerjaan alumni",
                'tanggal_buka' => "2025-01-01",
                'tanggal_tutup' => "2025-06-01",
            ]);
        }
    }
}
