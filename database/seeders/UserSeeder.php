<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'AubeMort',
            'email' => 'noah.pencherek@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('123456'),
            'remember_token' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Kratosse',
            'email' => 'Kratosse@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('123456'),
            'remember_token' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Yank',
            'email' => 'yank@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('123456'),
            'remember_token' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
