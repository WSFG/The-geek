<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    //
    public $table = 'activity';

    protected $fillable = [
        'text', 'user_id', 'type_id'
    ];

    public function type()
    {
        return DB::table('activity_type')->where('id', '=', $this->type_id)->get();
    }
}
