<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'rating', 'text', 'image',
    ];

    public function universes()
    {
        return $this->belongsToMany('App\Universe', 'news_to_universe');
    }

    public static function getNews()
    {
        return News::orderBy('updated_at', 'ASK')->take(Config::get("news.count"))->get();
    }

    public static function getNewsById($id)
    {
        return News::find($id);
    }
}
