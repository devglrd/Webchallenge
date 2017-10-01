<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
class DesignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('designs')->truncate();

        //insert data

        $design = [];
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++){

            $design[] = [
                'title'                 =>  $faker->sentence(rand(8, 12)),
                'slug'                  =>  $faker->slug(),
                'content'               =>  $faker->text($maxNbChars = 191),
                'level_design'          =>  rand(1, 3),
                'state'                 =>  rand(0, 2),
                'id_designer'           =>  rand(1,10),
                'id_designcategory'     =>  rand(1, 10),
                'created_at'            =>  $faker->dateTime($max = 'now', $timezone = date_default_timezone_get())
            ];

        }

        DB::table('designs')->insert($design);

    }
}
