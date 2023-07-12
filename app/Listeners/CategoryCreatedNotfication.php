<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Auth;
use App\Notifications\CategoryCrated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryCreatedNotfication
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
    public function handle(object $event): void
    {
        $user = Auth::user();

        $user->notify(new CategoryCrated($event->category));
    }
}
