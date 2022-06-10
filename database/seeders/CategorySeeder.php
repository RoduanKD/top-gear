<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory()->count(5)->create();

        $faker = \Faker\Factory::create();

        foreach ($categories as $category) {
            $category->addMediaFromUrl($faker->imageUrl(640, 480, 'animals', true));
        }
    }
}
