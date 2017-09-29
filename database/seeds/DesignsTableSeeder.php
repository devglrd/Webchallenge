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
                'title'         =>  $faker->sentence(rand(8, 12)),
                'content'       =>  $faker->paragraphs(rand(15, 20), true),
                'level_design'  =>  rand(1, 3),
                'state'         =>  rand(0, 2),
                'id_designer'   =>  rand(1,10),
                'id_category'   =>  rand(1, 30),
            ];

        }

        DB::table('designs')->insert($design);

    }
}
