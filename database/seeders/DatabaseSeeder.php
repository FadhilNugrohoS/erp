<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            bahan_bakuSeeder::class,
            BahanBakuSeeder::class,
            userSeeder::class,
            ProductSeeder::class,
            BoMSeeder::class,
            VendorSeeder::class,
        ]);
    }
}
