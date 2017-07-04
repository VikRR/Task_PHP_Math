<?php

namespace App\Observers;

use App\Model\Country;

class CountryObserver
{

    public function deleting(Country $country)
    {
        return $country->city()->delete();
    }

}