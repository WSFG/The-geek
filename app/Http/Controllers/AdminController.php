<?php

namespace App\Http\Controllers;

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
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
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
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
            return redirect('/');
        }
        return view('admin.news.index', array(
            'user' => Auth::user(),
        ));
    }

    public function newsEdit(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
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
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
            return redirect('/');
        }

        return view('admin.places.index', array(
            'user' => Auth::user(),
        ));
    }

    public function placeCreate()
    {
        if (!Auth::check() || Auth::user()->type_of_user_id < 2) {
            return redirect('/');
        }
        return view('admin.places.form', array(
            'user' => Auth::user(),
            'edit' => false,
            'place' => array(),
            'placeImage' => array(),
        ));
    }

    public function placeRemove(Request $request, $id)
    {
        Image::destroy(Place::find($id)->image_id);
        Place::destroy($id);
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
