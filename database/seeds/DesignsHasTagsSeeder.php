<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignsHasTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designs_has_tags')->truncate();

        $data = [];

        for($i = 1 ; $i <= 10 ; $i++){

           $data[] = [
                'id_design'     =>  $i,
                'id_tag'         =>  rand(1, 10)
           ];
        }

        DB::table('designs_has_tags')->insert($data);
    }
}
