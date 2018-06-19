<?php

use Illuminate\Database\Seeder;

class ActivityTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_type')->insert([
            'type' => 'Регистрация',
            'icon' => '/images/icons/register.png',
        ]);
        DB::table('activity_type')->insert([
            'type' => 'Добавление друга',
            'icon' => '/images/icons/register.png',
        ]);
        DB::table('activity_type')->insert([
            'type' => 'Посещение события',
            'icon' => '/images/icons/register.png',
        ]);
        DB::table('activity_type')->insert([
            'type' => 'Посещение места',
            'icon' => '/images/icons/register.png',
        ]);
    }
}
