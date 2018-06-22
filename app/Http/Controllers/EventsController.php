<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //
    public function index()
    {
        return view('events.index', ['user' => Auth::user(), 'events' => Event::all()]);
    }

    public function showEvent($id)
    {
        return view('events.show', ['user' => Auth::user(), 'event' => Event::find($id)]);
    }

    public function getAllEvents()
    {
        $result = array();
        $events = Event::all();
        foreach ($events as $event) {
            array_push($result, array(
                'id' => $event->id,
                'name' => $event->name,
                'description' => $event->description,
                'text' => $event->text,
                'date_of_start' => $event->date_of_start,
                'date_of_end' => $event->date_of_end,
                'places' => array(),
                'image' => $event->getMainImage(),
                'likes' => $event->likes(),
                'dislikes' => $event ->dislikes(),
//                'comments' => $event->comments,
            ));
        }
        return $result;
    }
}
