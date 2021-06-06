<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tags = ['bat-shit-crazy', 'alcoholic', 'hilarious', 'drunken', 'silly'];

        foreach ($tags as $tag) {
            Tag::factory()->create(['tag' => $tag]);
        }
    }
}
