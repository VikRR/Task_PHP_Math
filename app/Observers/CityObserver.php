<?php

namespace App\Observers;

use App\Model\City;

class CityObserver
{

    public function deleting(City $city)
    {
        $city->lang()->detach();
        $city->lang()->delete();

        return $city->delete();
    }

}