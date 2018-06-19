<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    public $table = "universe";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'public', 'image', 'description',
    ];

    public function news()
    {
        return $this->belongsToMany('App\News', 'news_to_universe');
    }

    public static function findByName($name)
    {
        return Universe::all()->where('name', '=', $name);
    }

    public static function universeConvert($universes)
    {
        if (!is_array($universes)) {
            $universes = array([$universes]);
        }
        $universesArray = array();
        foreach ($universes as $univers) {
            array_push($universesArray, array(
                'id' => $univers->id,
                'name' => $univers->name,
                'public' => $univers->public,
                'description' => $univers->description
            ));
        }
        return $universesArray;
    }
}
