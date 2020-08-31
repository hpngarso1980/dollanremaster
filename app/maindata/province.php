<?php

namespace App\maindata;

use App\users\cms_user;
use App\maindata\region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class province extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'cmsuser_id'
    ];

    public function cmsuser()
    {
        return $this -> belongsTo(cms_user::class);
    }
    public function regions()
    {
        return $this -> hasMany(region::class);
    }
}
