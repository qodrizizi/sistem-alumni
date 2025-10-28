<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventMembersSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('event_members')->insert([
                'event_id' => $i,
                'alumni_id' => $i,
                'status' => 'hadir',
            ]);
        }
    }
}
