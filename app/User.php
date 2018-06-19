<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;
use DateTime;

class User extends Authenticatable
{
    use Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'surname', 'birthday', 'email', 'phone_number', 'password', 'online', 'email_token', 'user_info_id', 'type_of_user_id'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }

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

    public static function userConvert($users)
    {
        if (!$users[0]) {
            $users = array($users);
        }
        $usersArray = array();
        foreach ($users as $user) {
            array_push($usersArray, array(
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'birthday' => $user->birthday,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'password' => $user->password,
                'is_confirmed' => $user->is_confirmed,
                'email_token' => $user->email_token,
                'last_login' => $user->last_login,
                'type_of_user_id' => $user->userType->name,
                'user_info' => UserInfo::converInfo($user->userInfo),
            ));
        }
        return $usersArray;
    }

    public static function writers()
    {
        return User::all()->where('type_of_user_id', '>', 0);
    }

    public static function moderators()
    {
        return User::all()->where('type_of_user_id', '>', 1);
    }

    public static function admins()
    {
        return User::all()->where('type_of_user_id', '>', 2);
    }

    public static function onlineCount()
    {
        $users = User::all();
        $onlineUsers = array();
        foreach ($users as $user) {
            if ($user->isOnline()) {
                array_push($onlineUsers, $user);
            }
        }
        return count($onlineUsers);
    }

    public static function notActiveCount()
    {
        $monthAfter = (new DateTime())->modify('-1 month')->format('Y-m-d');
        return count(User::all()->where('last_login', '>', $monthAfter));
    }

    public static function activeCount()
    {
        $monthAfter = (new DateTime())->modify('-1 day')->format('Y-m-d');
        return count(User::all()->where('last_login', '<', $monthAfter));
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

    public function activities()
    {
        return $this->hasMany('App\Activity', 'user_id');
    }

    public function friends($id)
    {
        $users1Id = DB::table('friend')->where('type_id', '=', '3')
            ->where('user_1_id', '=', $id)->get();
        $users2Id = DB::table('friend')->where('type_id', '=', '3')
            ->where('user_2_id', '=', $id)->get();
        $friend = [];
        foreach ($users1Id as $userId) {
            array_push($friend, User::findById($userId->user_2_id));
        }
        foreach ($users2Id as $userId) {
            array_push($friend, User::findById($userId->user_1_id));
        }
        return $friend;
    }

    public static function countries()
    {
        $users = User::all();
        $countries = array();
        foreach ($users as $user) {
            if ($user->user_info_id) {
                $countriesId = DB::table('user_info')
                    ->join('users', 'user_info.id', '=', 'users.user_info_id')
                    ->select('country_id')->get();
                foreach ($countriesId as $id) {
                    array_push($countries, array(
                        'country' => DB::table('countries')
                            ->select('country')->where('id', '=', $id->country_id)->first()
                            ->country,
                        'count' => DB::table('user_info')
                            ->where('country_id', '=', $id->country_id)->count()
                    ));
                }
            }
        }

        return $countries;
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

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
