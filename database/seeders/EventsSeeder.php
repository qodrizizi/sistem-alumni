<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('events')->insert([
                'id_event' => $i,
                'nama_event' => "Reuni Akbar $i",
                'tanggal_mulai' => '2025-12-01',
                'tanggal_selesai' => '2025-12-02',
                'lokasi' => "Aula $i",
                'deskripsi' => "Acara reuni ke-$i",
            ]);
        }
    }
}
