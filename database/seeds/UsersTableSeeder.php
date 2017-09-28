<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        //insert data

        $users = [];
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++){

            $users[] = [
                'name' => $faker->name(rand(8, 12)),
                'email' => $faker->email(rand(8, 12)),
                'password' => bcrypt($faker->password(rand(8, 12))),
                'bio' => $faker->paragraphs(rand(15, 20), true),
                'is_designer' => rand(0, 1),
                'is_integrator' => rand(0, 1),
                'permission' => 0,
            ];


        }

        DB::table('users')->insert($users);

    }
}
