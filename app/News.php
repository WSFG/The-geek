<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Laravel\Scout\Searchable;

class News extends Model
{
//    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'description', 'text', 'image_id',
    ];

//    /**
//     * Get the index name for the model.
//     *
//     * @return string
//     */
//    public function searchableAs()
//    {
//        return 'news_id';
//    }
//
//    /**
//     * Get the indexable data array for the model.
//     *
//     * @return array
//     */
//    public function toSearchableArray()
//    {
//        $array = $this->toArray();
//
//        return $array;
//    }

    public static function getNews()
    {
        return News::orderBy('updated_at', 'ASK')->take(Config::get("news.count"))->get();
    }

    public function universes()
    {
        return $this->belongsToMany('App\Universe', 'news_to_universe', 'news_id', 'universe_id');
    }

    public function getMainImage()
    {
        return $this->belongsTo('App\Image', 'image_id');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'comment_to_news', 'news_id', 'comment_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'news_to_user', 'news_id', 'user_id')
            ->withPivot('relationship_id');
    }

    public function writers()
    {
        return $this->users()->wherePivot('relationship_id', '=', 1)->get();
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
