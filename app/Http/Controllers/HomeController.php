<?php

namespace App\Http\Controllers;

use App\Article;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application start page.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        $news = News::getNews();
        $articles = Article::getArticlesByType(Article::Recommendation);
        if (Auth::check()) {
            return view('welcome', ['user' => Auth::user(), 'news' => $news, 'articles' => $articles]);
        } else {
            return view('welcome', ['news' => $news, 'articles' => $articles]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        User::logout();
        return view('welcome');
    }
}
