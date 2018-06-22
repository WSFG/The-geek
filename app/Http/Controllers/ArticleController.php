<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['user' => Auth::user(), 'articles' => Article::getArticlesByType(Article::Information)]);
    }

    public function showPlace($id)
    {
        return view('articles.show', ['user' => Auth::user(), 'article' => Article::find($id)]);
    }

    public function getAllArticles()
    {
        $result = array();
        $articles = Article::all();
        foreach ($articles as $article) {
            array_push($result, array(
                'id' => $article->id,
                'name' => $article->name,
                'description' => $article->description,
                'text' => $article->text,
                'image' => $article->getMainImage(),
                'type' => $article->getType()[0],
                'likes' => $article->likes(),
                'dislikes' => $article ->dislikes(),
//                'comments' => $article->comments,
            ));
        }
        return $result;
    }
}
