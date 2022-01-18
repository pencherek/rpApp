<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            'role_play_id' => 1,
            'name' => 'Noah',
            'stats' => '[]',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('characters')->insert([
            'role_play_id' => 1,
            'name' => 'Kratosse',
            'stats' => '[]',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('characters')->insert([
            'role_play_id' => 1,
            'name' => 'Yank MJ',
            'stats' => '[]',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('characters')->insert([
            'role_play_id' => 2,
            'name' => 'Noah Metro',
            'stats' => '[]',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
