<?php

namespace App\maindata;

use App\users\cms_user;
use App\maindata\company;
use App\maindata\province;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'province_id',
        'name',
        'cmsuser_id',
    ];

    public function province( )
    {
        return $this -> belongsTo(province::class);
    }
    public function cmsuser( )
    {
        return $this ->belongsTo(cms_user::class);
    }
    public function companies( )
    {
        return $this->hasMany(company::class);
    }
}
