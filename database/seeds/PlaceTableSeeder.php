<?php

use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place')->insert([
            'name' => 'Time to be a hero',
            'description' => 'Магазин комиксов',
            'text' => 'Магазин комиксов',
            'image' => '',
            'phone' => '8 029 666-74-74',
            'working_time' => 'Пн-Вс: 9:00 - 22:00',
            'address' => 'Ул. Веры Хоружей 5',
            'latitude' => 53.9176618,
            'longitude' => 27.5782083,
            'type_of_pace_id' => '1',
        ]);
    }
}
