<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    public $table = 'place';

    protected $fillable = [
        'id', 'name', 'description', 'text', 'phone', 'working_time', 'address', 'latitude', 'longitude', 'type_of_pace_id',
    ];

    public static function findById($id)
    {
        return Place::find($id);
    }

    public function placeType()
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

    public function users()
    {
        return $this->belongsToMany('App\User', 'place_to_user', 'place_id', 'user_id')
            ->withPivot('relationship_id');
    }

    public function likes()
    {
        return $this->users()->wherePivot('relationship_id', '=', 2)->get();
    }

    public function dislikes()
    {
        return $this->users()->wherePivot('relationship_id', '=', 3)->get();
    }
}
