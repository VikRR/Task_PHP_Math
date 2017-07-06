<?php

namespace App\Http\Controllers;

use App\Model\Country as CountryModel;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = CountryModel::firstOrCreate([
            'country' => strtolower($request->get('country')),
        ]);

        return $country;
    }

    /**
     * Ajax Обработка формы добавления страны, возвращаем форму для ввода города
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxStepTwo(Request $request)
    {
        $country = $this->store($request);

        return view('ajax.form_add_city', compact('country'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = CountryModel::findOrFail($id);

        return view('edit.country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = CountryModel::findOrFail($id);
        $country->fill([
            'country'=> strtolower($request->get('country')),
        ]);
        $country->save();

        return redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CountryModel $country
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(CountryModel $country)
    {
        $country->delete();

        return redirect('edit');
    }
}
