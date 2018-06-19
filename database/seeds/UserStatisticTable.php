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
    }
}
