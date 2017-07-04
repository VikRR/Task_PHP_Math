<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'country',
    ];

    public function city()
    {
        return $this->hasMany('App\Model\City');
    }
}
