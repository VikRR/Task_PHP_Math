<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [
        'country',
    ];

    public function city()
    {
        return $this->hasMany('App\Model\City');
    }
}
