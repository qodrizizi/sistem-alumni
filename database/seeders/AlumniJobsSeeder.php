<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniJobsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('alumni_jobs')->insert([
                'alumni_id' => $i,
                'perusahaan' => "PT Perusahaan $i",
                'posisi' => "Staff $i",
                'alamat_perusahaan' => "Alamat perusahaan $i",
                'bidang' => "Bidang $i",
                'mulai_bekerja' => "2020-01-01",
                'akhir_bekerja' => null,
                'status' => 'aktif',
            ]);
        }
    }
}
