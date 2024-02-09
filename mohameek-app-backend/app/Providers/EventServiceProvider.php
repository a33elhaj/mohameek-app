<?php

namespace App\Providers;

use App\Events\Users\UserCreated;
use App\Events\Users\UserUpdatedEvent;
use App\Listeners\Users\UserUpdatedListener;
use App\Listeners\Users\WelcomeUser;
use App\Subscribers\UserSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // UserCreated::class => [
        //     WelcomeUser::class,
        // ],
        // UserUpdatedEvent::class => [
        //     UserUpdatedListener::class,
        // ],
    ];

    protected $subscribe = [
        UserSubscriber::class,
    ]; //

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
