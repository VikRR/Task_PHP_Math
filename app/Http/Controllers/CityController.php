<?php

namespace App\Http\Controllers;

use App\Model\City as CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $city = CityModel::firstOrCreate([
            'city'       => strtolower($request->get('city')),
            'country_id' => $id,
        ]);

        return $city;
    }

    /**
     * Ajax Обработка формы добавления города, возвращаем форму для ввода языка
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxStepThree(Request $request, $id)
    {
        $city = $this->store($request, $id);

        return view('ajax.form_add_language', compact('city'));
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
        $city = CityModel::findOrFail($id);

        return view('edit.city', compact('city'));
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
        $city = CityModel::findOrFail($id);
        $city->fill([
            'city'=> strtolower($request->get('city')),
        ]);
        $city->save();

        return redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect('edit');
    }

    /**
     * Ajax получение всех городов связанных со страной
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectCities(Request $request)
    {
        $data = CityModel::select('id', 'city')
            ->where('country_id', $request->id)
            ->get();


        return response()->json($data);
    }
}
