<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'MainController@index');
Route::get('edit', 'MainController@show')->name('show.all');

Route::post('add-country', 'CountryController@ajaxStepTwo')->name('country.add');
Route::resource('country', 'CountryController', ['only' => ['store','edit', 'update', 'destroy']]);

Route::resource('city', 'CityController', ['only' => ['edit', 'update', 'destroy']]);
Route::post('city/', 'CityController@store')->name('city.store');
Route::get('find/city', 'CityController@selectCities');

Route::resource('language', 'LanguageController', ['only' => ['edit', 'update', 'destroy']]);
Route::get('language', 'MainController@language')->name('language.show');
Route::get('find/language', 'LanguageController@selectLanguages');

Route::post('language/{city}', 'LanguageController@store')->name('language.store');

Route::post('add-city/{country}', 'CityController@ajaxStepThree')->name('city.add');

