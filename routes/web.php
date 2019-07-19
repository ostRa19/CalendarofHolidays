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

Route::get('/', function () {
    return view('welcome');
});
Route::post("/welcome", "CalendarContriller@store");

    Route::group([
        'prefix'
    ], function () { 
      
            // get list of Currency
    Route::get('currency','CurrencyController@index');
    // get specific Currency
    Route::get('currency/{id}','CurrencyController@show');
    // create new Currency
    Route::post('currency','CurrencyController@store');
    // update existing Currency
    Route::put('currency','CurrencyController@store');
    // delete a Currency
    Route::delete('currency/{id}','CurrencyController@destroy');
 
    });
