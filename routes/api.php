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

/*
|---------------------------------------------------------------------------
| Hotel Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		HotelDetailsController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all the hotels information as well as a single hotel
|					information using its ID.
|					Updates and deletes a particular hotel information
*/

Route::get('hotels','HotelDetailsController@index')->name('hotelDetails.all');
Route::put('hotel/{id}', 'HotelDetailsController@update')->name('hotelDetails.update');
Route::post('hotel', 'HotelDetailsController@store')->name('hotelDetails.store');
Route::delete('hotel/{id}', 'HotelDetailsController@destroy')->name('hotelDetails.delete');


/*
|---------------------------------------------------------------------------
| Customer Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		CustomerManagerController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all customers as well as a customer information using its ID.
|					Updates and deletes a particular customer information
*/

Route::get('customers','CustomerManagerController@index')->name('customerInfo.all');
Route::get('customer/{customerManager}', 'CustomerManagerController@show')->name('customerInfo.show');
Route::post('customer', 'CustomerManagerController@store')->name('customerInfo.store');
Route::put('customer/{id}', 'CustomerManagerController@update')->name('customerInfo.update');
Route::delete('customer/{customerManager}', 'CustomerManagerController@destroy')->name('customerInfo.delete');


/*
|---------------------------------------------------------------------------
| Room Capacity Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		RoomCapacityController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all room capacity with its associated table details
|					as well as a room capacity information using its ID.
					Updates and deletes a particular room capacity
*/

Route::get('room/capacity','RoomCapacityManagerController@index')->name('roomCapacity.all');
Route::get('room/capacity/{id}', 'RoomCapacityManagerController@show')->name('roomCapacity.show');
Route::post('room/capacity', 'RoomCapacityManagerController@store')->name('roomCapacity.store');
Route::put('room/capacity/{roomCapacityManager}', 'RoomCapacityManagerController@update')->name('roomCapacity.update');
Route::delete('room/capacity/{roomCapacityManager}', 'RoomCapacityManagerController@destroy')->name('roomCapacity.delete');

/*
|---------------------------------------------------------------------------
| Room Types Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		RoomTypeController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all room types with its associated table details
|					as well as a room type information using its ID.
					Updates and deletes a particular room capacity
*/

Route::get('room/type','RoomTypeManagerController@index')->name('roomType.all');
Route::get('room/type/{id}', 'RoomTypeManagerController@show')->name('roomType.show');
Route::post('room/type', 'RoomTypeManagerController@store')->name('roomType.store');
Route::put('room/type/{roomTypeManager}', 'RoomTypeManagerController@update')->name('roomType.update');
Route::delete('room/type/{roomTypeManager}', 'RoomTypeManagerController@destroy')->name('roomType.delete');


/*
|---------------------------------------------------------------------------
| Room Manager Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		RoomManagerController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all rooms allocated within an hotel and can also
|					retrieve information about a room using its ID.
					Updates and deletes a particular room capacity
*/
Route::get('rmanager','RoomManagerController@index')->name('roomManager.all');
Route::get('rmanager/{roomManager}', 'RoomManagerController@show')->name('roomManager.show');
Route::post('rmanager', 'RoomManagerController@store')->name('roomManager.store');
Route::put('rmanager/{roomManager}', 'RoomManagerController@update')->name('roomManager.update');
Route::delete('rmanager/{roomManager}', 'RoomManagerController@destroy')->name('roomManager.delete');

/*
|---------------------------------------------------------------------------
| Price List Routes
|---------------------------------------------------------------------------
| URL: 				/api/
| Controller:		PriceListController
| Methods:			GET, POST, PUT, DELETE
| Description:		Gets all prices for a room of combination of capacity and type
|					and discount for wanting to book more than 4 days ahead.
*/

Route::get('pricelist','PriceListController@index')->name('priceList.all');
Route::get('pricelist/{priceList}', 'PriceListController@show')->name('priceList.show');
Route::post('search/pricelist', 'PriceListController@search')->name('priceList.search');
Route::post('pricelist', 'PriceListController@store')->name('priceList.store');
Route::put('pricelist/{priceList}', 'PriceListController@update')->name('priceList.update');
Route::delete('pricelist/{priceList}', 'PriceListController@destroy')->name('priceList.delete');
