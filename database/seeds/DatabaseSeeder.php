<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeOfUserTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(UniversesTableSeeder::class);
        $this->call(NewsToUniversesTableSeeder::class);
        $this->call(TypeOfPlaceTableSeeder::class);
        $this->call(PlaceTableSeeder::class);
    }
}