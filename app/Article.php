<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //
    public const Recommendation = 1;
    public const Information = 2;

    public $table = 'article';

    protected $fillable = [
        'id', 'name', 'description', 'text', 'image_id', 'type_id',
    ];

    public static function types()
    {
        return DB::table('article_type')->get();
    }

    public static function getArticlesByType($id)
    {
        return Article::all()->where('type_id', '=', $id);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'event_to_user', 'event_id', 'user_id')
            ->withPivot('relationship_id');
    }

    public function getMainImage()
    {
        return Image::find($this->image_id);
    }

    public function getType()
    {
        return DB::table('article_type')->where('id', $this->type_id)->get();
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
