<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumniSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'Ahmad', 'Budi', 'Citra', 'Dewi', 'Erik',
            'Fajar', 'Gita', 'Hendra', 'Indah', 'Joko'
        ];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('alumni')->insert([
                'id_alumni' => $i,
                'user_id' => $i,
                'nama_lengkap' => $names[$i-1],
                'jenis_kelamin' => ($i % 2 == 0 ? 'P' : 'L'),
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => "1995-01-01",
                'angkatan' => 2015,
                'tahun_lulus' => 2019,
                'alamat' => 'Alamat '.$i,
                'no_hp' => '0812345678'.$i,
                'foto' => 'default.jpg',
            ]);
        }
    }
}
