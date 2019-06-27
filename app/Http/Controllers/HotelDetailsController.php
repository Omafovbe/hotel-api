<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HotelDetails;

class HotelDetailsController extends Controller
{
    //Get all Hotel Details
    public function index()
    {
    	return HotelDetails::all();
    	//return response()->json(['message' => 'You are here'], 200);
    }

    //Create an Hotel with details
    public function store(Request $request)
    {
    	$hotelDetails = HotelDetails::create($request->all());

    	return response()->json($hotelDetails, 201);
    }

    //Update the Hotel Details
    public function update(Request $request, $id)
    {
    	$hotelDetails = HotelDetails::findOrFail($id);
    	$hotelDetails->update($request->all());
    	return response()->json($hotelDetails, 200);
    }

    //delete hotel details
    public function destroy($id)
    {
    	$hotelDetails = HotelDetails::find($id);
    	$hotelDetails->delete();

    	return response()->json([
            'message' => 'Successfully deleted Hotel Details!'
        ], 204);
    }
}
