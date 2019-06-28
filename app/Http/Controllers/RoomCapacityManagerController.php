<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomCapacityManager;
use App\Model\RoomTypeManager;

class RoomCapacityManagerController extends Controller
{
    //
     public function index()
    {
    	//All room capacities by name
    	return RoomCapacityManager::with('roomTypeManager')->get();;
    }

    public function show($id)
    {
    	//Single room capacity
    	return RoomCapacityManager::where('id', '=', $id)->with('roomTypeManager')->first();
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, ['room_capacity_name' => 'required']);

    	//Save to DB
    	$roomCapacityManager = RoomCapacityManager::create($request->only(['room_capacity_name']));

        /*
            Sync the room capacity method on room type
            This is possible if the room capacity ID is passed
        */
        //$roomTypeManagerID = $request->get('room_type_id');
        //$roomTypeManager = new RoomTypeManager();
        //$roomCapacityManager->roomTypeManager()->sync($roomTypeManagerID);

    	return response()->json(['message'=>'success', 'data'=>$roomCapacityManager], 201);
    }

    public function update(Request $request, RoomCapacityManager $roomCapacityManager)
    {
        //Validate entries
        $this->validate($request, ['room_capacity_name' => 'required'
    	]);

    	//Save to DB
        $roomCapacityManager->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $roomCapacityManager], 200);
    }

    public function destroy(RoomCapacityManager $roomCapacityManager)
    {
    	//Delete single room capacity type
    	$roomCapacityManager->delete();
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
