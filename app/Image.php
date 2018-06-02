<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'image';

    protected $fillable = [
        'path'
    ];

    public static function setMainPhoto($file, $category)
    {
        if ($file) {
            $file_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/thumb/' . $category), $file_name);
            return '/thumb/' . $category . '/' . $file_name;
        } else {
            return '/images/icons/user.svg';
        }
    }

    public static function removeOldPhoto($fileName, $category)
    {
        unlink(public_path('/thumb/' . $category) . $fileName);
    }
}
