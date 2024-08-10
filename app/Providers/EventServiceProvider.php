<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\TodoCreated;
use App\Events\TodoUpdated;
use App\Events\TodoDeleted;

use App\Listeners\SendTodoNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Map the TodoCreated event to the SendTodoNotification listener
        TodoCreated::class => [
            SendTodoNotification::class,
        ],

        // Map the TodoUpdated event to the SendTodoNotification listener
        TodoUpdated::class => [
            SendTodoNotification::class,
        ],

        // Map the TodoDeleted event to the SendTodoNotification listener
        TodoDeleted::class => [
            SendTodoNotification::class,
        ],
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
