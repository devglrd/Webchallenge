<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_design')->truncate();

        //insert data

        $tags = [];
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++){

            $tags[] = [
                'category_design' => $faker->domainWord(rand(8, 12)),
            ];

        }

        DB::table('categories_design')->insert($tags);

        DB::table('categories_post')->truncate();

        //insert data

        $tags = [];
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++){

            $tags[] = [
                'category_post' => $faker->domainWord(rand(8, 12)),
            ];

        }

        DB::table('categories_post')->insert($tags);
    }
}
