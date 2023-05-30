<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Mail;

class UserDataObserver
{
    /**
     * Handle the UserData "created" event.
     */
    public function created(UserData $userData): void
    {
        $user = User::where('id', $userData->user_id);
        Mail::to($user->email)->send(new \App\Mail\UserDataMail($userData));
    }

    /**
     * Handle the UserData "updated" event.
     */
    public function updated(UserData $userData): void
    {
        //
    }

    /**
     * Handle the UserData "deleted" event.
     */
    public function deleted(UserData $userData): void
    {
        //
    }

    /**
     * Handle the UserData "restored" event.
     */
    public function restored(UserData $userData): void
    {
        //
    }

    /**
     * Handle the UserData "force deleted" event.
     */
    public function forceDeleted(UserData $userData): void
    {
        //
    }
}
