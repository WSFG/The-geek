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
        //Default images
        DB::table('image')->insert([
            'path' => 'thumb/news/default.jpg',
        ]);
        //News images
        DB::table('image')->insert([
            'path' => 'thumb/news/1/13rw_203_04361r-380x215.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/2/39814594522_17f9fbbe81_k-min-380x215.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/3/Detroit-Become-Human.jpg',
        ]);
        DB::table('image')->insert([
            'path' => 'thumb/news/4/Devgamm18-59-380x215.jpg',
        ]);

        //Users image
        DB::table('image')->insert([
            'path' => 'thumb/users/1/rBQ9htheiRQ.jpg',
        ]);

        DB::table('image')->insert([
            'path' => 'thumb/users/2/1528040559_P1400189.RW2.jpg',
        ]);
    }
}
