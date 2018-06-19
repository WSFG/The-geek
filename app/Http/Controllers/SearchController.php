<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $result = [];
        array_merge($result,
            News::search($request->input('search'))->get(),
            User::search($request->input('search'))->get()
        );
        return $result;
    }
}
