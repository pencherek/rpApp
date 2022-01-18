<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_inventories')->insert([
            'inventory_id' => 1,
            'item_id' => 1,
            'quantity' => 1,
            'durability' => 80,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('item_inventories')->insert([
            'inventory_id' => 2,
            'item_id' => 2,
            'quantity' => 1,
            'durability' => 100,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
