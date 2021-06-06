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
        $this->call(TagSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BreedSeeder::class);
        $this->call(CatSeeder::class);
        $this->call(ImageSeeder::class);
    }
}
