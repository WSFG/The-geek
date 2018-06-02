<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable = [
        'country', 'city', 'skype', 'vk_id', 'instagram_id', 'facebook_id', 'twitter_id',
    ];
}
