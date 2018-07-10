<?php

namespace App;

use App\Events\ChatMessageWasReceived;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    public $table = "dialogs";

    protected $dispatchesEvents = [
        'created' => ChatMessageWasReceived::class
    ];
}
