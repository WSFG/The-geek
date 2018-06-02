<?php

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('relationship')->insert([
            'relationship' => 'Have',
        ]);
        DB::table('relationship')->insert([
            'relationship' => 'Like',
        ]);
        DB::table('relationship')->insert([
            'relationship' => 'Dislike',
        ]);
    }
}
