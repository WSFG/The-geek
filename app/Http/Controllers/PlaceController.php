<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    //
    public function showPlace($id)
    {
        return view('places.show', ['place' => Place::findById($id), 'user' => Auth::user()]);
    }
}
