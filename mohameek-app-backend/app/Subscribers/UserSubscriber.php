<?php


namespace App\Subscribers;


use App\Events\Users\UserCreated;
use App\Listeners\Users\WelcomeUser;
use Illuminate\Events\Dispatcher;

class UserSubscriber
{

    public function subscribe(Dispatcher $events)
    {
        $events->listen(UserCreated::class, WelcomeUser::class);
    }
}
