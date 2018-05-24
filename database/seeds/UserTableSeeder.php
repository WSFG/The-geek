<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Рома',
            'surname' => 'Колесников',
            'birthday' => DateTime::createFromFormat('Y-m-d', '1999-04-1'),
            'email' => 'kolesnikov.roma.1999@mail.ru',
            'phone_number' => '+375257337987',
            'password' => bcrypt('1803y2607a'),
            'user_main_photo' => '/images/icons/user.svg',
            'is_confirmed' => false,
            'last_login' => \Carbon\Carbon::now(),
            'online' => true,
            'type_of_user_id' => '2',
        ]);
    }
}
