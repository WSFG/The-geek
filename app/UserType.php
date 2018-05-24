<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public static function userTypes()
    {
        return UserType::all();
    }
}
