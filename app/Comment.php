<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';

    protected $fillable = [
        'user_id', 'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function news()
    {
        return $this->belongsToMany('App\Comment', 'comment_to_news', 'comment_id', 'news_id');
    }

    public static function convertComment($comments)
    {
        if (!is_array($comments)) {
            $comments = array($comments);
        }
        $result = array();
        foreach ($comments as $comment) {
            array_push($result, array(
                'id' => $comment->id,
                'text' => $comment->text,
                'user' => User::userConvert($comment->user()),
            ));
        }

        return $result;
    }
}
