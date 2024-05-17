<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->insert([
            [
                'id' => 1,
                'title' => 'Interstellar',
                'director' => 'Christofer Nolan',
                'genre' => 'Science fiction / Drama',
                'price' => 20,
                'stock' => 4,
                'poster' => 'img/movies/1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "In the near future around the American Midwest, Cooper, an ex-science engineer and pilot, is tied to his farming land with his daughter Murph and son Tom. As devastating sandstorms ravage Earth's crops, the people of Earth realize their life here is coming to an end as food begins to run out. Eventually stumbling upon a N.A.S.A. base 6 hours from Cooper's home, he is asked to go on a daring mission with a few other scientists into a wormhole because of Cooper's scientific intellect and ability to pilot aircraft unlike the other crew members. In order to find a new home while Earth decays, Cooper must decide to either stay, or risk never seeing his children again in order to save the human race by finding another habitable planet.",
                'rating' => 3.6,
            ],
            [
                'id' => 2,
                'title' => 'E.T. the Extra-Terrestrial',
                'director' => 'Steven Spielberg',
                'genre' => 'Science fiction',
                'price' => 10,
                'stock' => 13,
                'poster' => 'img/movies/2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "Left behind by his group of secret visitors, a harmless extraterrestrial gets stranded on Earth, surrounded by an intimidatingly strange and unknown environment. Alone and fearful, he is fortunate to be discovered by a lonely 10-year-old boy named Elliott, who, after the initial shock, decides to take him in, and gives him a name--E.T. Little by little, a bond will form and as our hospitable blue planet becomes a prison brimming with dangers and government agents, Elliott and his team of rescuers must work fast to find a way to reunite E.T. with his otherworldly family. Even if this means Elliott will lose an unexpected but dear friend.",
                'rating' => 0.0,
            ],
            [
                'id' => 3,
                'title' => 'The Matrix',
                'director' => 'Lana Wachowski / LillyWachowski',
                'genre' => 'Action / Science fiction',
                'price' => 20,
                'stock' => 19,
                'poster' => 'img/movies/3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "Thomas A. Anderson is a man living two lives. By day he is an average computer programmer and by night a hacker known as Neo. Neo has always questioned his reality, but the truth is far beyond his imagination. Neo finds himself targeted by the police when he is contacted by Morpheus, a legendary computer hacker branded a terrorist by the government. As a rebel against the machines, Neo must confront the agents: super-powerful computer programs devoted to stopping Neo and the entire human rebellion.",
                'rating' => 0.0,
            ],
            [
                'id' => 4,
                'title' => 'Titanic',
                'director' => 'James Cameron',
                'genre' => 'Romance / Catastrophe / Drama',
                'price' => 30,
                'stock' => 11,
                'poster' => 'img/movies/4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "After winning a trip on the RMS Titanic during a dockside card game, American Jack Dawson spots the society girl Rose DeWitt Bukater who is on her way to Philadelphia to marry her rich snob fiancé Caledon Hockley. Rose feels helplessly trapped by her situation and makes her way to the aft deck and thinks of suicide until she is rescued by Jack. Cal is therefore obliged to invite Jack to dine at their first-class table where he suffers through the slights of his snobbish hosts. In return, he spirits Rose off to third-class for an evening of dancing, giving her the time of her life. Deciding to forsake her intended future all together, Rose asks Jack, who has made his living making sketches on the streets of Paris, to draw her in the nude wearing the invaluable blue diamond Cal has given her. Cal finds out and has Jack locked away. Soon afterwards, the ship hits an iceberg and Rose must find Jack while both must run from Cal even as the ship sinks deeper into the freezing water.",
                'rating' => 0.0,
            ],
            [
                'id' => 5,
                'title' => 'Perfume: The Story of a Murderer',
                'director' => 'Tom Tykwer',
                'genre' => 'Horror novel / Mystery / Postmodernism / Naturalism',
                'price' => 25,
                'stock' => 21,
                'poster' => 'img/movies/5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "In the squalid slums of eighteenth-century Paris, the French orphan, Jean-Baptiste Grenouille, is blessed, and, at the same time, cursed with an uncannily acute sense of smell. Little by little--as the young man discovers the world and a myriad of primitive scents--one fragrance, in particular, remains frustratingly elusive: the fleeting aroma of a woman's body. Haunted by a catalytic act of violence and obsessed with capturing the female essence, Jean-Baptiste dedicates himself to the dark quest of creating the ultimate perfume; an intricate process that compels the damned alchemist to find enlightenment. Even if the answers he seeks demand sacrifice.",
                'rating' => 0.0,
            ],
            [
                'id' => 7,
                'title' => 'The Parent Trap',
                'director' => 'Nancy Meyers',
                'genre' => 'Children / Comedy',
                'price' => 15,
                'stock' => 13,
                'poster' => 'img/movies/7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "When two pre-teens named Hallie and Annie meet at summer camp, their lives are rattled when they realize that they are identical twins. With parents, British mother aka famous dress designer Elizabeth and American father, a wine maker named Nick, living on different sides of the universe, the girls decide to make an identity swap in hopes of spending time with their other parent. The girls later choose to inform their guardians of the swap while at a hotel in San Francisco, which later reunites the divorced pair and they remarry.",
                'rating' => 0.0,
            ],
            [
                'id' => 8,
                'title' => 'Kill Bill',
                'director' => 'Quentin Tarantino',
                'genre' => 'Action / Thriller',
                'price' => 40,
                'stock' => 5,
                'poster' => 'img/movies/8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "A young woman in El Paso, Texas, awakens after a four year long coma to find her baby daughter gone and immediately swears revenge on the people that put her in this position. As her story unfolds we learn that the mysterious woman had a really checkered past and was a member of an elite squad of assassins and highly trained in martial arts and advanced sword fighting. Her plans to get married and live a peaceful life were quickly taken away from her by her boss, known only as 'Bill'. Bill and the remaining members of his elite squad stage an attack on her wedding, leaving no witnesses behind. The woman, known only as 'The Bride', heads to Pasadena, CA to confront another on her list, and then to Okinawa, Japan, where she meets a highly sought after blade maker named Hattori Hanzo. Hanzo, who had given up the craft several years ago, is reluctant to help The Bride at first, crafts her a new sword which she uses to take out her revenge. Now heading to Tokyo, The Bride sets her sight on the next member of her list - O'Ren Ishii, the head of the Japanese mafia, and her own private army who she used to carry out the attack on The Bride's wedding. Will The Bride carry out her plans and give Bill his just desserts?",
                'rating' => 0.0,
            ],
            [
                'id' => 12,
                'title' => 'The Lord of the Rings: The Rings of Power',
                'director' => 'Patrick McKay / J.D. Payne',
                'genre' => 'Action / Adventures',
                'price' => 15,
                'stock' => 8,
                'poster' => 'img/movies/12.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'plot' => "The Rings of Power, as the name suggests, is the story leading up to the creation of Sauron's ring. It's the history and politics of Middle-earth after a brutal war and the efforts to grow and thrive after. We're going to see Dwarven kingdoms at their most glorious instead of the ruins we see in Lord of the Rings. We'll follow a younger, impulsive and battle-hardened Galadriel long before she becomes the powerful, ethereal being we meet in the movies . We're going to see how the great Kings of Men went from being a great and powerful empire to the shattered, scattered remains haunted by the Ringwraiths they created through their own greed and malice.",
                'rating' => 0.0,
            ],
        ]);
    }
}
