<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomTypeManager;

class RoomTypeManagerController extends Controller
{
    //
     public function index()
    {
    	//All room types
    	return RoomTypeManager::all();
    }

    public function show(RoomTypeManager $roomTypeManager)
    {
    	//Single room type
    	return $roomTypeManager;
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, ['room_type_name' => 'required']);

    	//Save to DB
    	$roomTypeManager = RoomTypeManager::create($request->only(['room_type_name']));

    	$return response()->json(['message'=>'success', 'data'=>$roomTypeManager], 201);
    }

    public function update(Request $request, RoomTypeManager $roomTypeManager)
    {
        //Validate entries
        $this->validate($request, ['room_type_name' => 'required'
    	]);

    	//Save to DB
        $roomTypeManager->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $roomTypeManager], 200);
    }

    public function destroy(RoomTypeManager $roomTypeManager)
    {
    	//Delete a single room type
    	$roomTypeManager->delete()
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
