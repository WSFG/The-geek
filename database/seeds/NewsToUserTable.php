<?php

use Illuminate\Database\Seeder;

class NewsToUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_to_user')->insert([
            'news_id' => '1',
            'user_id' => '1',
            'relationship_id' => '1',
        ]);
        DB::table('news_to_user')->insert([
            'news_id' => '1',
            'user_id' => '1',
            'relationship_id' => '2'
        ]);
    }
}
