<?php

namespace App\Http\Controllers;

use App\Model\City as CityModel;
use App\Model\Country as CountryModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function show()
    {
        $countries = CountryModel::with('city.lang')->get();
        //dd($countries);

        return view('show_all', compact('countries'));
    }

    public function language()
    {
        $countries = CountryModel::pluck('country', 'id');
        //dd($countries);

        return view('languages', compact('countries'));
    }

    //public function selectCities(Request $request)
    //{
    //    $data = CityModel::select('id', 'city')
    //        ->where('country_id', $request->id)
    //        ->get();
    //
    //
    //    return response()->json($data);
    //}
}
