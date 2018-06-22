<?php

namespace App\Http\Controllers;

use App\Article;
use App\Event;
use App\Place;
use App\Universe;
use App\User;
use App\Image;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }
        return view('admin.dashboard.index', array(
            'user' => Auth::user(),
            'allUserCount' => count(User::all()),
            'verificationUserCount' => count(User::all()->where('is_confirmed', '=', true)),
            'onlineUserCount' => User::onlineCount(),
            'notActiveUserCount' => User::notActiveCount(),
            'articlesCount' => 0,
            'eventsCount' => count(Event::all()),
            'newsCount' => count(News::all()),
            'placesCount' => 0
        ));
    }

    public function news()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }
        return view('admin.news.index', array(
            'user' => Auth::user(),
        ));
    }

    public function newsEdit(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        $news = News::find($id);

        return view('admin.news.form', array(
            'user' => Auth::user(),
            'edit' => true,
            'news' => $news,
            'newsImage' => $news->getMainImage,
            'newsWriters' => $news->writers(),
            'newsUniverses' => $news->universes,
            'writers' => User::writers(),
            'universes' => Universe::all(),
        ));
    }

    public function newsEditPost(Request $request, $id)
    {
        $news = News::find($id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');

        if ($request->file('image')) {
            Image::destroy($news->image_id);
            $image = Image::create([
                'path' => Image::setMainPhoto($request->file('image'), 'news', $news->id),
            ]);

            $news->image_id = $image->id;
        }

        $news->save();

        $universes = $request->get('universe');
        if (count($universes) !== 0) {
            foreach ($universes as $universe) {
                $flag = true;
                foreach ($news->universes as $newsUniverse) {
                    if ($newsUniverse->id === $universe->id) {
                        $flag = false;
                    }
                }
                if ($flag) {
                    $news->universes()->attach($universe);
                }
            }
        }

        $writers = $request->get('writers');
        if (count($writers) !== 0) {
            foreach ($writers as $writer) {
                $flag = true;
                $newsWriters = $news->writers();
                foreach ($newsWriters as $newsWriter) {
                    if ($newsWriter->id === $writer->id) {
                        $flag = false;
                    }
                }
                if ($flag) {
                    $news->users()->attach($writer, array('relationship_id' => 1));
                }
            }
        }

        return redirect('/admin/news');
    }

    public function newsCreate()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
            return redirect('/');
        }
        return view('admin.news.form', array(
            'user' => Auth::user(),
            'edit' => false,
            'news' => array(),
            'newsImage' => array(),
            'newsUniverses' => array(),
            'newsWriters' => array(Auth::user()),
            'writers' => User::writers(),
            'universes' => Universe::all()
        ));
    }

    public function newsCreatePost(Request $request)
    {
        $news = News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'image_id' => 1
        ]);

        $image = Image::create([
            'path' => Image::setMainPhoto($request->file('image'), 'news', $news->id),
        ]);

        $news->image_id = $image->id;
        $news->save();

        $universes = $request->get('universe');
        if (count($universes) !== 0) {
            foreach ($universes as $universe) {
                $news->universes()->attach($universe);
            }
        }

        $writers = $request->get('writers');
        if (count($writers) !== 0) {
            foreach ($writers as $writer) {
                $news->users()->attach($writer, array('relationship_id' => 1));
            }
        }

        return redirect('/admin/news');
    }

    public function newsRemove(Request $request, $id)
    {
        Image::destroy(News::find($id)->image_id);
        News::destroy($id);
    }

    public function places()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        return view('admin.places.index', array(
            'user' => Auth::user(),
        ));
    }

    public function placeCreate()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }
        return view('admin.places.form', array(
            'user' => Auth::user(),
            'edit' => false,
            'place' => array(),
            'types' => Place::types(),
            'placeTypes' => array(),
            'placeImage' => array(),
        ));
    }

    public function placeCreatePost(Request $request)
    {
        $place = Place::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'phone' => $request->input('phone'),
            'working_time' => $request->input('working_time'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'type_of_pace_id' => $request->input('type'),
            'image_id' => 1
        ]);

        $image = Image::create([
            'path' => Image::setMainPhoto($request->file('image'), 'places', $place->id),
        ]);

        $place->image_id = $image->id;
        $place->save();

        return redirect('/admin/places');
    }

    public function placeEdit(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        $place = Place::find($id);

        return view('admin.places.form', array(
            'user' => Auth::user(),
            'edit' => true,
            'place' => $place,
            'types' => Place::types(),
            'placeTypes' => $place->placeType(),
            'placeImage' => $place->getMainImage(),
        ));
    }

    public function placeEditPost(Request $request, $id)
    {
        $place = Place::find($id);

        $place->name = $request->input('name');
        $place->description = $request->input('description');
        $place->text = $request->input('text');
        $place->phone = $request->input('phone');
        $place->working_time = $request->input('working_time');
        $place->address = $request->input('address');
        $place->latitude = $request->input('latitude');
        $place->longitude = $request->input('longitude');
        $place->type_of_pace_id = $request->input('type');

        if ($request->file('image')) {
            Image::destroy($place->image_id);
            $image = Image::create([
                'path' => Image::setMainPhoto($request->file('image'), 'places', $place->id),
            ]);

            $place->image_id = $image->id;
        }

        $place->save();

        return redirect('/admin/places');
    }

    public function placeRemove(Request $request, $id)
    {
        Image::destroy(Place::find($id)->image_id);
        Place::destroy($id);
    }

    public function events()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        return view('admin.events.index', array(
            'user' => Auth::user(),
        ));
    }

    public function eventCreate()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }
        return view('admin.events.form', array(
            'user' => Auth::user(),
            'edit' => false,
            'event' => array(),
            'eventImage' => array(),
        ));
    }

    public function eventCreatePost(Request $request)
    {
        $event = Event::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'date_of_start' => new DateTime($request->input('date_of_start')),
            'date_of_end' => new DateTime($request->input('date_of_end')),
            'image_id' => 1
        ]);

        $image = Image::create([
            'path' => Image::setMainPhoto($request->file('image'), 'events', $event->id),
        ]);

        $event->image_id = $image->id;
        $event->save();

        return redirect('/admin/events');
    }

    public function eventEdit(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        $event = Event::find($id);

        return view('admin.events.form', array(
            'user' => Auth::user(),
            'edit' => true,
            'event' => $event,
            'eventImage' => $event->getMainImage(),
        ));
    }

    public function eventEditPost(Request $request, $id)
    {
        $event = Event::find($id);

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->text = $request->input('text');
        $event->date_of_start = new DateTime($request->input('date_of_start'));
        $event->date_of_end = new DateTime($request->input('date_of_end'));

        if ($request->file('image')) {
            Image::destroy($event->image_id);
            $image = Image::create([
                'path' => Image::setMainPhoto($request->file('image'), 'events', $event->id),
            ]);

            $event->image_id = $image->id;
        }

        $event->save();

        return redirect('/admin/events');
    }

    public function eventRemove(Request $request, $id)
    {
        Image::destroy(Event::find($id)->image_id);
        Event::destroy($id);
    }

    public function articles()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        return view('admin.articles.index', array(
            'user' => Auth::user(),
        ));
    }

    public function articleCreate()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }
        return view('admin.articles.form', array(
            'user' => Auth::user(),
            'edit' => false,
            'article' => array(),
            'types' => Article::types(),
            'articleTypes' => array(),
            'articleImage' => array(),
        ));
    }

    public function articleCreatePost(Request $request)
    {
        $article = Article::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'text' => $request->input('text'),
            'type_id' => $request->input('type'),
            'image_id' => 1
        ]);

        $image = Image::create([
            'path' => Image::setMainPhoto($request->file('image'), 'articles', $article->id),
        ]);

        $article->image_id = $image->id;
        $article->save();

        return redirect('/admin/articles');
    }

    public function articleEdit(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < User::Editor) {
            return redirect('/');
        }

        $article = Article::find($id);

        return view('admin.articles.form', array(
            'user' => Auth::user(),
            'edit' => true,
            'article' => $article,
            'types' => Article::types(),
            'articleTypes' => $article->getType(),
            'articleImage' => $article->getMainImage(),
        ));
    }

    public function articleEditPost(Request $request, $id)
    {
        $article = Article::find($id);

        $article->name = $request->input('name');
        $article->description = $request->input('description');
        $article->text = $request->input('text');
        $article->type_id = $request->input('type');

        if ($request->file('image')) {
            Image::destroy($article->image_id);
            $image = Image::create([
                'path' => Image::setMainPhoto($request->file('image'), 'articles', $article->id),
            ]);

            $article->image_id = $image->id;
        }

        $article->save();

        return redirect('/admin/articles');
    }

    public function articleRemove(Request $request, $id)
    {
        Image::destroy(Article::find($id)->image_id);
        Article::destroy($id);
    }

    public function countUserStatistic()
    {
        $statistic = DB::table('user_statistic')
            ->where('date', '>', (new DateTime())->modify('-1 month')->format('Y-m-d'))
            ->get();
        return json_encode($statistic);
    }

    public function countryUserStatistic()
    {
        return json_encode(User::countries());
    }
}
