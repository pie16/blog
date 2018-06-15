<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ru_RU');

        // Create 50 product records
        for ($i = 0; $i < 10; $i++) {
            \App\Post::create([
                'title' => $faker->realText($faker->numberBetween(30,50)),
                'content' => $faker->realText(1000, 2),
                'slug' => $faker->slug,
                'user_id' => $faker->numberBetween($min = 1, $max = 2)
            ]);
        }
    }
}
