<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route for Hotel information and mutations
Route::get('hotel','HotelDetailsController@index')->name('hotelDetails.all');
Route::put('hotel/{id}', 'HotelDetailsController@update')->name('hotelDetails.update');
Route::post('hotel', 'HotelDetailsController@store')->name('hotelDetails.store');
Route::delete('hotel/{id}', 'HotelDetailsController@destroy')->name('hotelDetails.delete');
