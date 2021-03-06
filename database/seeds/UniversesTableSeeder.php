<?php

use Illuminate\Database\Seeder;

class UniversesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universe')->insert([
            'name' => 'Game',
            'public' => 'starwars',
            'description' => 'Star Wars is an American epic space opera media franchise, centered on a film series created by George Lucas. It depicts the adventures of various characters "a long time ago in a galaxy far, far away".',
        ]);

        DB::table('universe')->insert([
            'name' => 'Serial',
            'public' => 'marvel',
            'description' => 'Marvel Comics is the common name and primary imprint of Marvel Worldwide Inc., formerly Marvel Publishing, Inc. and Marvel Comics Group, a publisher of comic books and related media. In 2009, The Walt Disney Company acquired Marvel Entertainment, Marvel Worldwide\'s parent company.'
        ]);
    }
}
