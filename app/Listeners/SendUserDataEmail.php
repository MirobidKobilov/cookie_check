<?php

namespace App\Listeners;

use App\Events\UserDataCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendUserDataEmail
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
    public function handle(UserDataCreated $event): void
    {
        \Mail::to($event->teacher->email)->send(
            new SendUserDataEmail($event));
    }
}
