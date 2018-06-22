<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserStatisticTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-01'),
            'active_count' => 1,
            'all_count' => 1,
            'verified_count' => 0,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-02'),
            'active_count' => 1,
            'all_count' => 2,
            'verified_count' => 1,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-03'),
            'active_count' => 2,
            'all_count' => 2,
            'verified_count' => 2,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-04'),
            'active_count' => 5,
            'all_count' => 5,
            'verified_count' => 3,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-05'),
            'active_count' => 12,
            'all_count' => 12,
            'verified_count' => 7,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-06'),
            'active_count' => 23,
            'all_count' => 23,
            'verified_count' => 15,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-07'),
            'active_count' => 20,
            'all_count' => 33,
            'verified_count' => 17,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-08'),
            'active_count' => 22,
            'all_count' => 40,
            'verified_count' => 28,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-09'),
            'active_count' => 30,
            'all_count' => 43,
            'verified_count' => 30,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-10'),
            'active_count' => 43,
            'all_count' => 50,
            'verified_count' => 35,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-11'),
            'active_count' => 33,
            'all_count' => 55,
            'verified_count' => 35,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-12'),
            'active_count' => 30,
            'all_count' => 61,
            'verified_count' => 35,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-13'),
            'active_count' => 33,
            'all_count' => 61,
            'verified_count' => 36,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-14'),
            'active_count' => 40,
            'all_count' => 65,
            'verified_count' => 37,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-15'),
            'active_count' => 45,
            'all_count' => 70,
            'verified_count' => 37,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-16'),
            'active_count' => 24,
            'all_count' => 71,
            'verified_count' => 37,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-17'),
            'active_count' => 20,
            'all_count' => 71,
            'verified_count' => 38,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-18'),
            'active_count' => 43,
            'all_count' => 72,
            'verified_count' => 49,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-19'),
            'active_count' => 44,
            'all_count' => 80,
            'verified_count' => 50,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-20'),
            'active_count' => 44,
            'all_count' => 81,
            'verified_count' => 50,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-21'),
            'active_count' => 50,
            'all_count' => 90,
            'verified_count' => 55,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-22'),
            'active_count' => 70,
            'all_count' => 112,
            'verified_count' => 60,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-23'),
            'active_count' => 50,
            'all_count' => 112,
            'verified_count' => 61,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-24'),
            'active_count' => 42,
            'all_count' => 113,
            'verified_count' => 61,
            'not_active_count' => 0,
        ]);

        DB::table('user_statistic')->insert([
            'date' => Carbon::createFromFormat('Y-m-d', '2018-06-25'),
            'active_count' => 40,
            'all_count' => 115,
            'verified_count' => 61,
            'not_active_count' => 0,
        ]);
    }
}
