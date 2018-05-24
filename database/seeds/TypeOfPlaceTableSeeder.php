<?php

use Illuminate\Database\Seeder;

class TypeOfPlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_place')->insert([
            'type' => 'shop',
        ]);
        DB::table('type_of_place')->insert([
            'type' => 'cafe',
        ]);
    }
}
