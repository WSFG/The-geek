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
}
