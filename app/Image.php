<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'image';

    protected $fillable = [
        'id', 'path'
    ];

    public static function setMainPhoto($file, $category, $id)
    {
        if ($file) {
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/thumb/' . $category . '/' . $id), $file_name);
            return '/thumb/' . $category . '/' . $id . '/' . $file_name;
        } else {
            return '/images/icons/user.svg';
        }
    }

    public static function removeOldPhoto($fileName, $category)
    {
        unlink(public_path('/thumb/' . $category) . $fileName);
    }

    public static function convert($images)
    {
        if (!$images[0]) {
            $images = array($images);
        }
        $result = array();
        foreach ($images as $image) {
            array_push($result, array(
                'id' => $image->id,
                'path' => url($image->path),
            ));
        }
        return $result;
    }
}
