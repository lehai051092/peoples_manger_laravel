<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            "id" => "1",
            "region_Name" => "Miền Bắc",
        ]);

        DB::table('regions')->insert([
            "id" => "2",
            "region_Name" => "Miền Trung",
        ]);

        DB::table('regions')->insert([
            "id" => "3",
            "region_Name" => "Miền Nam",
        ]);
    }
}
