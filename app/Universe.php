<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'public', 'image', 'description',
    ];

    public function news()
    {
        return $this->belongsToMany('App\News', 'news_to_universe');
    }
}
