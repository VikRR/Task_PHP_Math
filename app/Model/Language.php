<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $table = 'languages';

    protected $fillable = [
        'language',
    ];

    public function cities()
    {
        return $this->belongsToMany('App\Model\City', 'cities_languages', 'language_id', 'city_id');
    }
}
