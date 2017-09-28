<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $posts = [];
        $faker = Factory::create();

        for( $i = 0 ; $i < 10 ;$i++){

            $posts[] =[
                'title' => $faker->title(),
                'content' => $faker->text($maxNbChars = 200),
                'id_user' => rand(0, 10),
            ];

        }


        DB::table('posts')->insert($posts);
    }
}
