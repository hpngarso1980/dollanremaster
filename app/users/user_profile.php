<?php

namespace App\users;

use App\users\app_user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_profile extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'appuser_id',
        'image_url',
        'fullname',
        'gender', //default is male
        'birthdate', //default 1995/01/01 00:00:00
        'birthplace', //default Jakarta
        'starsign', //calculated
        'zodiac_url', //nullable
        'contactname', //nullable
        'contactphone' //nullable
    ];

    //child parent relation (1 user have only 1 profile)
    public function appuser()
    {
        return $this -> belongsTo(app_user::class);
    }

    //zodiac calculation
    public static function zodiac($date)
    {
        $month = $date->birthdate->format('M');
        $day = $date->birthdate->format('d');

        /*
        get month
        January -> zodiac Capricorn and Aquarius
        */
        if($month == 1)
        {
            if($day >= 1 && $day < 21)
            {
                $result['zodiac'] = 'Capricorn';
                $result['image'] = 'Capricorn.jpg';
            }
            elseif($day > 20)
            {
                $result['zodiac'] = 'Aquarius';
                $result['image'] = 'Aquarius.jpg';
            }
        }
        elseif($month == 2)
        {
            if($day >= 1 && $day < 20)
            {
                $result['zodiac'] = 'Aquarius';
                $result['image'] = 'Aquarius.jpg';
            }
            elseif($day > 19)
            {
                $result['zodiac'] = 'Pisces';
                $result['image'] = 'Pisces.jpg';
            }
        }
        elseif($month == 3)
        {
            if($day >= 1 && $day < 21)
            {
                $result['zodiac'] ='Pisces';
                $result['image'] = 'Pisces.jpg';
            }
            elseif($day > 20)
            {
                $result['zodiac'] ='Aries';
                $result['image'] = 'Aries.jpg';
            }
        }
        elseif($month == 4)
        {
            if($day >= 1 && $day < 20)
            {
                $result['zodiac'] ='Aries';
                $result['image'] = 'Aries.jpg';
            }
            elseif($day > 19)
            {
                $result['zodiac']='Taurus';
                $result['image'] = 'Taurus.jpg';
            }
        }
        elseif($month == 5)
        {
            if($day >= 1 && $day < 21)
            {
                $result['zodiac'] ='Taurus';
                $result['image'] = 'Taurus.jpg';
            }
            elseif($day > 20)
            {
                $result['zodiac'] ='Gemini';
                $result['image'] = 'Gemini.jpg';
            }
        }
        elseif($month == 6)
        {
            if($day >= 1 && $day < 21)
            {
                $result['zodiac'] ='Gemini';
                $result['image'] = 'Gemini.jpg';
            }
            elseif($day > 20)
            {
                $result['zodiac'] ='Cancer';
                $result['image'] = 'Cancer.jpg';
            }
        }
        elseif($month == 7)
        {
            if($day >= 1 && $day < 23)
            {
                $result['zodiac'] ='Cancer';
                $result['image'] = 'Cancer.jpg';
            }
            elseif($day > 22)
            {
                $result['zodiac'] ='Leo';
                $result['image'] = 'Leo.jpg';
            }
        }
        elseif($month == 8)
        {
            if($day >= 1 && $day < 23)
            {
                $result['zodiac']='Leo';
                $result['image'] = 'Leo.jpg';
            }
            elseif($day > 22)
            {
                $result['zodiac'] ='Virgo';
                $result['image'] = 'Virgo.jpg';
            }
        }
        elseif($month == 9)
        {
            if($day >= 1 && $day < 23)
            {
                $result['zodiac'] ='Virgo';
                $result['image'] = 'Virgo.jpg';
            }
            elseif($day > 22)
            {
                $result['zodiac'] ='Libra';
                $result['image'] = 'Libra.jpg';
            }
        }
        elseif($month == 10)
        {
            if($day >= 1 && $day < 23)
            {
                $result['zodiac']='Libra';
                $result['image'] = 'Libra.jpg';
            }
            elseif($day > 22)
            {
                $result['zodiac'] ='Scorpio';
                $result['image'] = 'Scorpio.jpg';
            }
        }
        elseif($month == 11)
        {
            if($day >= 1 && $day < 23)
            {
                $result['zodiac'] ='Scorpio';
                $result['image'] = 'Scorpio.jpg';
            }
            elseif($day > 22)
            {
                $result['zodiac']='Sagittarius';
                $result['image'] = 'Sagittarius.jpg';
            }
        }
        elseif($month == 12)
        {
            if($day >= 1 && $day < 22)
            {
                $result['zodiac'] ='Sagittarius';
                $result['image'] = 'Sagittarius.jpg';
            }
            elseif($day > 21)
            {
                $result['zodiac'] ='Capricorn';
                $result['image'] = 'Capricorn.jpg';
            }
        }

        //return result value
        return $result;
    }
}
