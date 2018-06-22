<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Place extends Model
{
    //
    public $table = 'place';

    protected $fillable = [
        'id', 'name', 'description', 'text', 'phone', 'working_time', 'address', 'latitude', 'longitude', 'type_of_pace_id', 'image_id',
    ];

    public static function findById($id)
    {
        return Place::find($id);
    }

    public static function types()
    {
        return DB::table('type_of_place')->get();
    }

    public function placeType()
    {
        return DB::table('type_of_place')->where('id', '=', $this->type_of_pace_id)->get();
    }

    public function getMainImage()
    {
        return Image::find($this->image_id);
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
