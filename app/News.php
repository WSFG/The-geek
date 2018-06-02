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
        'title', 'description', 'rating', 'text',
    ];

    public static function getNews()
    {
        return News::orderBy('updated_at', 'ASK')->take(Config::get("news.count"))->get();
    }

    public function universes()
    {
        return $this->belongsToMany('App\Universe', 'news_to_universe');
    }

    public function images()
    {
        return $this
            ->belongsToMany('App\Image', 'news_to_image', 'news_id', 'image_id')
            ->withPivot('is_main');
    }

    public function getMainImage()
    {
        return $this->images()->wherePivot('is_main', '=', true);
    }
}
