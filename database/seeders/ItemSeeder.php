<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'category_id' => '1',
            'name' => 'Iron chestplate',
            'maxDurability' => '80',
            'priceBase' => '160',
            'weight' => '20',
            'description' => 'Basic iron chestplate',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('items')->insert([
            'category_id' => '2',
            'name' => 'Iron sword',
            'maxDurability' => '40',
            'priceBase' => '100',
            'weight' => '2',
            'description' => 'Basic iron sword',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
