<?php

namespace App\Http\Controllers;

use App\News;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:45',
            'description' => 'required|string',
            'text' => 'required|string',
            'image' => 'required'
        ]);
    }

    public function newsCreate(array $data)
    {
        $this->validator($data)->validate();

        Image::create([
            'path' => Image::setMainPhoto($data['news_photo'], 'news'),
        ]);

        return News::create([
            'title' => $data['tile'],
            'description' => $data['description'],
            'text' => $data['text'],
        ]);
    }

    public function newsEdit($id, array $data)
    {
        $this->validator($data)->validate();

        $news = News::find($id);

        if ($news) {
            $image = $news->getMainImage();
            Image::removeOldPhoto($image->path, 'news');
            $image->path = Image::setMainPhoto($data['news_photo'], 'news');

            $news->title = $data['title'];
            $news->description = $data['description'];
            $news->text = $data['text'];

            $news->save();
        }
    }
}
