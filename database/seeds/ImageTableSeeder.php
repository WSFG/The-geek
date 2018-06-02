<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //News images
        DB::table('image')->insert([
            'path' => 'thumb/news/13rw_203_04361r-380x215.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/39814594522_17f9fbbe81_k-min-380x215.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/Detroit-Become-Human.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/Devgamm18-59-380x215.jpg',
        ]);

        //Users image
        DB::table('image')->insert([
            'path' => 'thumb/users/rBQ9htheiRQ.jpg',
        ]);
    }
}
