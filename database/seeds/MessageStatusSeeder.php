<?php

use Illuminate\Database\Seeder;

class MessageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('messages_status')->insert([
            'status' => 'Sent',
        ]);
        DB::table('messages_status')->insert([
            'status' => 'Viewed',
        ]);
        DB::table('messages_status')->insert([
            'status' => 'Error',
        ]);
    }
}
