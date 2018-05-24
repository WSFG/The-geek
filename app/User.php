<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birthday', 'email', 'phone_number', 'password', 'user_main_photo', 'online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function setPhoto($file)
    {
        if ($file) {
            $file->move(public_path('thumb'), $file->getClientOriginalName());
            return '/thumb/' . $file->getClientOriginalName();
        } else {
            return '/images/icons/user.svg';
        }
    }

    public static function logout()
    {
        Auth::logout();
    }

    public static function findById($id)
    {
        return User::find($id);
    }

    public function userType()
    {
        return $this->hasOne('UserType', 'type_of_user_id');
    }

    public function userInfo()
    {
        return $this->hasOne('UserInfo', 'user_info_id');
    }

    public function calculate_age() {
        $birthday_timestamp = strtotime($this->birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }
}
