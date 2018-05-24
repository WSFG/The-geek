<?php

use Illuminate\Database\Seeder;

class TypeOfUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_user')->insert([
            'name' => 'user',
        ]);
        DB::table('type_of_user')->insert([
            'name' => 'admin',
        ]);
        DB::table('type_of_user')->insert([
            'name' => 'editor',
        ]);
        DB::table('type_of_user')->insert([
            'name' => 'moderator',
        ]);
    }
}
