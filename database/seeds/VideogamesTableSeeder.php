<?php

use Illuminate\Database\Seeder;
use \App\Videogame;

class VideogamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 25; $i++) {
            Videogame::create([
                'name' => $faker->sentence(1),
                'company' => $faker->sentence(1),
                'author' => $faker->sentence(1),
                'launch_date' => $faker->date(now())
            ]);
        }
    }
}
