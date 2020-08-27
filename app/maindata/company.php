<?php

namespace App\maindata;

use App\users\cms_user;
use App\maindata\region;
use App\maindata\operator;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'address', //nullable
        'region_id', //nullable
        'phone', //nullable
        'map', //nullable
        'cmsuser_id',
    ];

    //child to parent relation
    public function region( )
    {
        return $this -> belongsTo(region::class);
    }
    public function cmsuser( )
    {
        return $this -> belongsTo(cms_user::class);
    }

    //parent to child relation
    public function operators( )
    {
        return $this -> hasMany(operator::class);
    }
}
