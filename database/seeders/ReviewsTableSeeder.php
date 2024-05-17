<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'id' => 1,
                'movie_id' => 1,
                'user_id' => 1,
                'comment' => "This is a good movie, I recommend to buy it, I'm sure that everybody will like to see this amazing movie",
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'movie_id' => 1,
                'user_id' => 8,
                'comment' => "The best I've ever seen",
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'movie_id' => 1,
                'user_id' => 1,
                'comment' => "I love this movie",
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'movie_id' => 1,
                'user_id' => 7,
                'comment' => "Me encantó la película",
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'movie_id' => 1,
                'user_id' => 7,
                'comment' => "Me arrepentí",
                'rating' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
