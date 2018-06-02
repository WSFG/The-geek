<?php

use Illuminate\Database\Seeder;

class NewsToUniversesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_to_universe')->insert([
            'news_id' => '1',
            'universe_id' => '2',
        ]);
        DB::table('news_to_universe')->insert([
            'news_id' => '2',
            'universe_id' => '2',
        ]);
        DB::table('news_to_universe')->insert([
            'news_id' => '3',
            'universe_id' => '2',
        ]);
        DB::table('news_to_universe')->insert([
            'news_id' => '4',
            'universe_id' => '1',
        ]);

        DB::table('news_to_universe')->insert([
            'news_id' => '4',
            'universe_id' => '2',
        ]);
    }
}
