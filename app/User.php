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
        'name', 'surname', 'birthday', 'email', 'phone_number', 'password', 'online', 'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
        return $this->hasOne('App\UserType', 'type_of_user_id');
    }

    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'user_info_id');
    }

    public function calculate_age() {
        $birthday_timestamp = strtotime($this->birthday);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'user_to_image')->withPivot('is_main', 'relationship_id');
    }

    public function getMainImage()
    {
        return $this->images()->wherePivot('is_main', '=', 1)->first();
    }

    public function friends()
    {
        return DB::table('friend')->where('type_id', '=', '3');
    }

    public function setFriend($recepientId)
    {
        if(DB::table('friend')->where('user_1_id', '=', $this->id)
            ->orWhere('user_2_id', '=', $this->id)->get()) {
            DB::table('friend')->where('user_1_id', '=', $this->id)
                ->orWhere('user_2_id', '=', $this->id)->update(['type_id', 3]);
        } else {
            DB::table('friend')->insert([
                [$this->id, $recepientId, 1]
            ]);
        }
    }

    public function declineFriend($recepientId)
    {
        DB::table('friend')->where('user_1_id', '=', $this->id)
            ->orWhere('user_2_id', '=', $this->id)->update(['type_id', 2]);
    }
}
