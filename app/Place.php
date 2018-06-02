<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    public static function findById($id)
    {
        return Place::find($id);
    }

    public function userType()
    {
        return $this->hasOne('PlaceType', 'type_of_pace_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'news_to_image')->withPivot('is_main');
    }

    public function getMainImage()
    {
        return $this->images()->wherePivot('is_main', '=', true);
    }
}
