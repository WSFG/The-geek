<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'text', 'sender_id', 'dialog_id', 'status_id'
    ];

}
