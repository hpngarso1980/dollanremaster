<?php

namespace App\security;

use App\users\cms_user;
use App\users\admin_user;
use App\security\access_priviledge;
use Illuminate\Database\Eloquent\Model;

class data_access extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description', //nullable
        'cmsuser_id',
    ];

    //child parent relations
    public function cmsuser( )
    {
        return $this -> belongsTo(cms_user::class);
    }

    //parent child relations
    public function accesspreviledges( )
    {
        return $this -> hasMany(access_priviledge::class);
    }
    public function adminuser( )
    {
        return $this -> hasMany(admin_user::class);
    }
}
