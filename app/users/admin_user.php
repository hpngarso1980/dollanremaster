<?php

namespace App\users;

use App\users\cms_user;
use App\maindata\operator;
use App\security\data_access;
use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cmsuser_id',
        'operator_id',
        'access_id',
    ];

    //child parent relations
    public function cmsuser( )
    {
        return $this -> belongsTo(cms_user::class);
    }
    public function operator( )
    {
        return $this -> belongsTo(operator::class);
    }
    public function dataaccess( )
    {
        return $this -> belongsTo(data_access::class);
    }
}
