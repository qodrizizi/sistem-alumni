<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=10; $i++) {
            DB::table('users')->insert([
                'id_user' => $i,
                'username' => 'user'.$i,
                'email' => 'user'.$i.'@mail.com',
                'password' => Hash::make('password123'),
                'role' => 'alumni',
            ]);
        }
    }
}
