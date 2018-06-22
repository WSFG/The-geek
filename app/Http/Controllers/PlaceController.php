<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    //
    public function index()
    {
        return view('places.index', ['places' => Place::all(), 'user' => Auth::user()]);
    }

    public function showPlace($id)
    {
        return view('places.show', ['place' => Place::findById($id), 'user' => Auth::user()]);
    }

    public function getPlace($id)
    {
        $place = Place::findById($id);
        return array(
            'id' => $place->id,
            'name' => $place->name,
            'description' => $place->description,
            'text' => $place->text,
            'phone' => $place->phone,
            'working_time' => $place->working_time,
            'address' => $place->address,
            'latitude' => $place->latitude,
            'longitude' => $place->longitude,
            'image' => $place->getMainImage(),
            'place_type' => $place->placeType(),
            'likes' => $place->likes(),
            'dislikes' => $place->dislikes(),
        );
    }

    public function getAllPlaces()
    {
        $result = array();
        $places = Place::all();
        foreach ($places as $place) {
            array_push($result, array(
                'id' => $place->id,
                'name' => $place->name,
                'description' => $place->description,
                'text' => $place->text,
                'phone' => $place->phone,
                'working_time' => $place->working_time,
                'address' => $place->address,
                'latitude' => $place->latitude,
                'longitude' => $place->longitude,
                'image' => $place->getMainImage(),
                'place_type' => $place->placeType(),
                'likes' => $place->likes(),
                'dislikes' => $place->dislikes(),
//                'comments' => $place->comments,
            ));
        }
        return $result;
    }
}
