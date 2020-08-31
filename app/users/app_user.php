<?php

namespace App\users;

use App\User;
use App\users\user_profile;
use Illuminate\Database\Eloquent\Model;

class app_user extends User
{
    //parents and child relations
    public function userprofile()
    {
        return $this -> hasOne(user_profile::class);
    }
}
