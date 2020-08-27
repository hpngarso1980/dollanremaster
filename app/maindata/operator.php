<?php

namespace App\maindata;

use App\users\cms_user;
use App\maindata\company;
use App\users\admin_user;
use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'company_id',
        'image_url',
        'name',
        'description',
        'pic',
        'website',
        'phone',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'cmsuser_id'
    ];

    //child parent relations
    public function company( )
    {
        return $this -> belongsTo(company::class);
    }
    public function cmsuser( )
    {
        return $this -> belongsTo(cms_user::class);
    }

    //parent child relations
    public function adminuser( )
    {
        return $this -> hasMany(admin_user::class);
    }
}
