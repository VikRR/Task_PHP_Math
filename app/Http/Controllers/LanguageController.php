<?php

namespace App\Http\Controllers;


use App\Model\Language;
use Illuminate\Http\Request;
use App\Model\City as CityModel;
use App\Model\Language as LanguageModel;

class LanguageController extends Controller
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
        $city = CityModel::findOrFail($id);
        $lang = LanguageModel::firstOrCreate([
            'language' => strtolower($request->get('language')),
        ]);

        if (!$city->lang()->find($lang->id)) {
            $city->lang()->attach($lang);
        }

        return redirect('/');

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
        $language = LanguageModel::findOrFail($id);

        return view('edit.language', compact('language'));
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
        $language = LanguageModel::findOrFail($id);
        $language->fill([
            'language'=> strtolower($request->get('language')),
        ]);
        $language->save();

        return redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LanguageModel $language
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return redirect('edit');
    }

    /**
     * Ajax получение все языков связанных с городом
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectLanguages(Request $request)
    {
        $city = CityModel::findOrFail($request->id);

        return response()->json($city->lang);
    }
}
