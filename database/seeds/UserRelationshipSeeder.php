<?php

use Illuminate\Database\Seeder;

class UserRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_relationship')->insert([
            'relationship' => 'Invite',
        ]);
        DB::table('user_relationship')->insert([
            'relationship' => 'Declined',
        ]);
        DB::table('relationship')->insert([
            'relationship' => 'Accepted',
        ]);
    }
}
