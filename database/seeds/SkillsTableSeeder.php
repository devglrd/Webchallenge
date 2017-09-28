<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->truncate();

        $skills = [];

        $faker = Factory::create();

        for ($i = 0; $i <= 20; $i++){

            $skills = [
                'name' => $faker->domainWord(rand(8, 12)),
            ];

        }


        DB::table('skills')->insert($skills);
    }
}
