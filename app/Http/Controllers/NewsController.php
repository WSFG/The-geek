<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function start() {
        $news = News::all()->orderBy('updated_at', 'ASK')->paginate(10);
    }
}
