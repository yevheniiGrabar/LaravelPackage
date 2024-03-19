<?php

namespace Yevhenii\UserRegistrationNotifier;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Yevhenii\UserRegistrationNotifier\Events\UserRegistered;
use Yevhenii\UserRegistrationNotifier\Jobs\SendWelcomeEmailJob;

class Listener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        dispatch(new SendWelcomeEmailJob($user));
    }
}