<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class PostsHasTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_has_tags')->truncate();

        $data = [];

        for($i = 1 ; $i <= 10; $i++){

            $data[] = [
                'id_post'   => $i,
                'id_tag'    => rand(1, 10)
            ];

        }

        DB::table('posts_has_tags')->insert($data);
    }
}
