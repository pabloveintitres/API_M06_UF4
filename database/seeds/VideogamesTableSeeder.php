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

        for ($i = 0; $i < 25; $i++) {
            Videogame::create([
                'name' => $faker->word(),
                'company' => $faker->word(),
                'author' => $faker->name,
                'launch_date' => $faker->date(now())
            ]);
        }
    }
}
