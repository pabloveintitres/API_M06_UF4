<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
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
        for ($i = 0; $i < 50; $i++) {

            $id = random_int(1, 25);

            $numWords = random_int(5, 15);

            Comment::create([
                'author' => $faker->name,
                'date' => $faker->date(now()),
                'videogame_id' => $id,
                'text' => $faker->sentence($numWords)
            ]);
        }
    }
}
