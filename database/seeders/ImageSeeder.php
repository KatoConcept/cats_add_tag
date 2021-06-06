<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::all()->each(function ($cat) {
            Image::factory()->count(rand(0, 3))->create(['cat_id' => $cat->id]);
        });
    }
}
