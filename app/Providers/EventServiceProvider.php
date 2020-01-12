<?php

namespace App\Providers;

use App\Events\EventsInfoEvent;
use App\Events\PosLastEvent;
use App\Events\PosNextEvent;
use App\Events\VisitorEvent;
use App\Listeners\EventsInfoListener;
use App\Listeners\PosListener;
use App\Listeners\VisitorListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PosLastEvent::class=>[
            PosListener::class
        ],
        PosNextEvent::class=>[
            PosListener::class
        ],
        VisitorEvent::class=>[
            VisitorListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
