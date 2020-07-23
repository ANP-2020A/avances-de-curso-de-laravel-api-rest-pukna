<?php

use App\Article;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Article::truncate();
        $faker = \Faker\Factory::create();

        $users = App\User::all();
        foreach ($users as $user) {
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            $num_articles = 5;         for ($j = 0; $j < $num_articles; $j++) {
                Article::create([
                    'title' => $faker->sentence,
                    'body' => $faker->paragraph,
                    'category_id' => $faker->numberBetween(1, 3),
                ]);
                }

        }
    }
}
