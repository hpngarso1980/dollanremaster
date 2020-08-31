<?php

namespace App\users;

use App\User;
use App\maindata\region;
use App\maindata\company;
use App\users\admin_user;
use App\maindata\province;
use App\security\data_access;
use App\security\access_priviledge;
use Illuminate\Database\Eloquent\Model;

class cms_user extends User
{
    //parent child with one relation
    public function adminuser()
    {
        return $this -> hasOne(admin_user::class);
    }

    //parent to child relations
    public function provinces()
    {
        return $this -> hasMany(province::class);
    }
    public function regions()
    {
        return $this -> hasMany(region::class);
    }
    public function companies()
    {
        return $this->hasMany(company::class);
    }
    public function operators()
    {
        return $this -> hasMany(operator::class);
    }
    public function dataaccess()
    {
        return $this -> hasMany(data_access::class);
    }
    public function accesspreviledges()
    {
        return $this -> hasMany(access_priviledge::class);
    }
}
