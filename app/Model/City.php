<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    //use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = [
        'city',
        'country_id',
    ];

    public function lang()
    {
        return $this->belongsToMany('App\Model\Language', 'cities_languages', 'city_id', 'language_id');
    }
}
