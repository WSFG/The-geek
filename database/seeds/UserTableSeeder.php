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
        DB::table('user_info')->insert([
            'country_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Рома',
            'surname' => 'Колесников',
            'birthday' => DateTime::createFromFormat('Y-m-d', '1999-04-1'),
            'email' => 'kolesnikov.roma.1999@mail.ru',
            'phone_number' => '+375257337987',
            'password' => bcrypt('1803y2607a'),
            'email_token' => base64_encode('kolesnikov.roma.1999@mail.ru'),
            'last_login' => \Carbon\Carbon::now(),
            'type_of_user_id' => 4,
            'user_info_id' => 1,
        ]);

        DB::table('user_to_image')->insert([
            'is_main' => true,
            'user_id' => 2,
            'image_id' => 7,
            'relationship_id' => 1
        ]);

        DB::table('user_info')->insert([
            'country_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Яна',
            'surname' => 'Стригельская',
            'birthday' => DateTime::createFromFormat('Y-m-d', '1999-03-18'),
            'email' => 'y.strigelskaya@gmail.com',
            'phone_number' => '+375445613684',
            'password' => bcrypt('1803y2607a'),
            'email_token' => base64_encode('y.strigelskaya@gmail.com'),
            'last_login' => \Carbon\Carbon::now(),
            'type_of_user_id' => 4,
            'user_info_id' => 2,
        ]);

        DB::table('user_to_image')->insert([
            'is_main' => true,
            'user_id' => 1,
            'image_id' => 6,
            'relationship_id' => 1
        ]);
    }
}
