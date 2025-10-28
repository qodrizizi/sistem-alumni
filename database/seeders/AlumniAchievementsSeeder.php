<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniAchievementsSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('alumni_achievements')->insert([
                'alumni_id' => $i,
                'nama_prestasi' => "Juara Lomba $i",
                'tingkat' => 'Nasional',
                'penyelenggara' => "Kemdikbud",
                'tahun' => 2023,
                'deskripsi' => "Prestasi alumni $i",
            ]);
        }
    }
}
