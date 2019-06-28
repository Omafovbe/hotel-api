<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomTypeManager;
//use App\Model\RoomCapacityManager;

class RoomTypeManagerController extends Controller
{
    //
     public function index()
    {
    	//All room types
    	return RoomTypeManager::with('roomCapacityManager')->get();
        //return response()->json(['msg' => 'here'],200);
    }

    public function show($id)
    {
    	//Single room type
    	return RoomTypeManager::where('id', '=', $id)->with('roomCapacityManager')->first();
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, ['room_type_name' => 'required']);

    	//Save to DB
    	$roomTypeManager = RoomTypeManager::create($request->only(['room_type_name']));

        /*
            Sync the room capacity method on room type
            This is possible if the room capacity ID is passed
        */
        //$roomCapacityManagerID = $request->get('room_capacity_id');
        //$roomTypeManager = new RoomTypeManager();
        //$roomTypeManager->roomCapacityManager()->sync($roomCapacityManagerID);

    	return response()->json(['message'=>'success', 'data'=>$roomTypeManager], 201);
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
    	$roomTypeManager->delete();
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
