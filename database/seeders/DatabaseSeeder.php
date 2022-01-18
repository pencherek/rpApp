<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            RolePlaySeeder::class,
            CharacterSeeder::class,
            CharacterUserSeeder::class,
            ItemSeeder::class,
            InventorySeeder::class,
            CharacterInventorySeeder::class,
            ItemInventorySeeder::class,
            RolePlayUserSeeder::class
        ]);
    }
}
