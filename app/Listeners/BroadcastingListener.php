<?php

namespace App\Listeners;

use App\Events\BroadcastingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class BroadcastingListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BroadcastingEvent $event): void
    {
        Cache::put('broadcasting', $event, now()->addMinutes(1));
    }
}
