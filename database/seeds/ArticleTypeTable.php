<?php

use Illuminate\Database\Seeder;

class ArticleTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article_type')->insert([
            'type' => 'Recommendation',
        ]);

        DB::table('article_type')->insert([
            'type' => 'Information',
        ]);
    }
}
