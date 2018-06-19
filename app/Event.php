<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $table = 'event';

    protected $fillable = [
        'name', 'description', 'text', 'date_of_start', 'date_of_end'
    ];
}
