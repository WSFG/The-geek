<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        Broadcast::channel('chat-room.*', function ($user, $chatroomId) {
            if ($user) { // Заменить настоящими правилами ACL
                return true;
            }
        });

        require base_path('routes/channels.php');
    }
}
