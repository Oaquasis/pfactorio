<?php

namespace pfactorio\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'pfactorio\Events\ModSyncStarted' => [
            'pfactorio\Listeners\NotifyUsers'
        ],
        'pfactorio\Events\ModSyncFinished' => [
            'pfactorio\Listeners\NotifyUsers'
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
