<?php

namespace App\security;

use App\users\cms_user;
use App\security\data_access;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class access_priviledge extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'access_id',
        'name', //module name
        'look', //default false
        'add', //default false
        'update', //default false
        'delete', //default false
        'cmsuser_id',
    ];

    //child parent relations
    public function dataaccess()
    {
        return $this -> belongsTo(data_access::class);
    }
    public function cmsuser()
    {
        return $this -> belongsTo(cms_user::class);
    }
}
