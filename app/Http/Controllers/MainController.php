<?php

namespace App\Http\Controllers;

use App\Model\Country as CountryModel;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function show()
    {
        $countries = CountryModel::with('city.lang')->get();

        return view('show_all', compact('countries'));
    }

    public function language()
    {
        $countries = CountryModel::pluck('country', 'id');

        return view('languages', compact('countries'));
    }
}
