<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniEducationSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('alumni_education')->insert([
                'alumni_id' => $i,
                'jenjang' => 'S1',
                'institusi' => "Universitas Negeri $i",
                'jurusan' => "Teknik Informatika",
                'tahun_mulai' => 2020,
                'tahun_selesai' => 2024,
            ]);
        }
    }
}
