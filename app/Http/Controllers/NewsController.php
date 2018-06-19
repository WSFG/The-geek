<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use App\Image;
use App\Universe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index($id)
    {
        return view('news.show', ['news' => News::find($id), 'user' => Auth::user()]);
    }

    public function addComment(Request $data)
    {
        $comment = Comment::create([
            'user_id' => $data->input("user_id"),
            'text' => $data->input("text"),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $comment->news()->attach($data->input("news_id"));

        return json_encode(array(
            'url' => url('user/' . $comment->user_id),
            'img' => url($comment->user->getMainImage()->path),
            'name' => $comment->user->name . ' ' . $comment->user->surname,
            'text' => $comment->text
        ));
    }

    public function getAllNews()
    {
        $result = array();
        $news = News::all();
        foreach ($news as $item) {
            array_push($result, array(
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'text' => $item->text,
                'image' => $item->getMainImage,
                'universes' => $item->universes,
                'writers' => $item->writers(),
                'likes' => $item->likes(),
                'dislikes' => $item->dislikes(),
                'comments' => $item->comments,
            ));
        }
        return $result;
    }
}
