
<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        //insert data

        $tags = [];
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++){

            $tags[] = [
                'name' => $faker->domainWord(rand(8, 12))
            ];

        }

        DB::table('tags')->insert($tags);
    }
}
