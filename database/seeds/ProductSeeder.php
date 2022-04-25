<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('products')->delete();
        DB::table('products')->insert([
           ["name"=> "car"],
           ["name"=> "moto cycle"],
           ["name"=> "bycle"],
           

        ]);
    }
}
