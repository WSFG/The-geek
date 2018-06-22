<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $table = 'event';

    protected $fillable = [
        'id', 'name', 'description', 'text', 'date_of_start', 'date_of_end', 'image_id'
    ];

    public function getMainImage()
    {
        return Image::find($this->image_id);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'event_to_user', 'event_id', 'user_id')
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
