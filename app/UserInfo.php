<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    public $table = 'user_info';
    public $timestamps = false;

    protected $fillable = [
        'country', 'city', 'skype', 'vk_id', 'instagram_id', 'facebook_id', 'twitter_id',
    ];

    public static function converInfo($info)
    {
        return array(
            'country' => $info->country,
            'city' => $info->city,
            'skype' => $info->skype,
            'vk_id' => $info->vk_id,
            'instagram_id' => $info->instagram_id,
            'facebook_id' => $info->facebook_id,
            'twitter_id' => $info->twitter_id
        );
    }
}
