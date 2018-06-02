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
            'email_token' => base64_encode('kolesnikov.roma.1999@mail.ru'),
            'last_login' => \Carbon\Carbon::now(),
            'type_of_user_id' => 2,
        ]);

        DB::table('user_to_image')->insert([
           'is_main' => true,
            'user_id' => 1,
            'image_id' => 4,
            'relationship_id' => 1
        ]);
    }
}
