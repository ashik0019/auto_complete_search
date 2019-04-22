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

Route::get('/ddd', function () {
    return view('welcome');
});
Route::get('/','CountryController@index');
Route::post('/autocomplete/fetch','CountryController@fetch')->name('autocomplete.fetch');
