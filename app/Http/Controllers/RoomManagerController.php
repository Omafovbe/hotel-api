<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomManager;

class RoomManagerController extends Controller
{
    //
    public function index()
    {
    	//All the rooms
    	return RoomManager::all();
    }

    public function show(RoomManager $roomManager)
    {
    	//Single room by user
    	return $roomManager;
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, [
    		'room_name' => 'required',
    		'hotel_id' => 'required'
    		'room_type_id' => 'required',
    		'room_capacity_id' => 'required',
    		'room_image' => 'required',

    	]);

    	//Save to DB
    	$roomManager = RoomManager::create($request->only([
    		'room_name',
    		'hotel_id',
    		'room_type_id',
    		'room_capacity_id',
    		'room_image',
    	]));

    	$return response()->json(['message'=>'success', 'data'=>$roomManager], 201);
    }

    public function update(Request $request, RoomManager $roomManager)
    {
        //Validate entries
        $this->validate($request, [
    		'room_name' => 'required',
    		'hotel_id' => 'required'
    		'room_type_id' => 'required',
    		'room_capacity_id' => 'required',
    		'room_image' => 'required',

    	]);

    	//Save to DB
        $roomManager->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $roomManager], 200);
    }

    public function destroy(RoomManager $roomManager)
    {
    	//Delete a single room info
    	$roomManager->delete()
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
