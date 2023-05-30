<?php

namespace App\Observers;

use App\Mail\UserDataMail;
use App\Models\UserData;
// use Illuminate\Contracts\Mail;

class UserDataObserver
{
    public function created(UserData $model)
    {
        \Mail::to($model->email)->send(new UserDataMail($model));
    }
}
