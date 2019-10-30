<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peoples')->insert([
            "id" => "1",
            "name" => "Hai",
            "email"=> "mskumji5@gmail.com",
            "age" => "11",
            "country" => "Hà Nội",
            "image" => ""
        ]);
    }
}
