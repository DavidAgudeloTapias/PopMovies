<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'id' => 1,
                'title' => 'The Spider Within: A Spider-Verse Story Short Tells A New Official Miles Morales Tale – Watch Now',
                'content' => "We might still be facing a long wait for Spider-Man: Beyond The Spider-Verse, but there is an extra snippet for Spider-action 
                            online now — one that has a noble purpose. Check out the new short The Spider Within: A Spider-Verse Story, which you can see below: 
                            https://www.youtube.com/watch?v=AFPLRIdn1pk It's all in aid of the Kevin Love Fund, which is based around teaching young people about 
                            mental health in relatable fashion. The Spider Within finds Miles Morales (Shameik Moore) dealing with the pressure of balancing 
                            his teenage life with that of being his universe's one and only Spider-Man, protecting Brooklyn and the city. Miles share his struggles 
                            with his own mental health, including a panic attack after a particularly tough day. And he learns that asking for help can be as 
                            powerful as battling evil.This new short was directed by Jarelle Dampier and written by Khailia Amazan, as part of Sony's LENS program, 
                            the Leading and Empowering New Storytellers (LENS) program, a 9-month leadership training program that provides candidates from 
                            underrepresented groups with an opportunity to gain valuable leadership experience in animation.",
                'source' => 'https://www.empireonline.com/movies/news',
                'image' => 'img/news/1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Empire’s Christopher Nolan Special Collector’s Edition Revealed',
                'content' => "He’s twisted time. He’s reinvented Batman. He’s conquered the box office multiple times over. And he’s always done it entirely his 
                            own way. There’s nobody out there like Christopher Nolan – a game-changing filmmaker who makes masterpieces like nobody’s business, deploying 
                            cerebral cinematic craft to create big-impact blockbusters. Over the last 25 years, he’s proven himself as one of the all-time greats – and so, 
                            in the wake of his landmark Oscar wins for Oppenheimer, Empire presents the ultimate tribute: a one-off collector’s edition dedicated to a director 
                            like no other. In this limited-edition magazine, we take a deep-dive trip through Nolan’s entire filmography, presenting not only the finest 
                            archive material from the Empire vault – collected as we’ve followed the man’s career through the years – but brand-new articles. That includes 
                            a major conversation with Nolan himself – plus his producing partner and wife Emma Thomas – conducted this April, looking back on the masterworks 
                            they’ve made together, and an exclusive tribute written by Denis Villeneuve.",
                'source' => 'https://www.empireonline.com/movies/news',
                'image' => 'img/news/2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
