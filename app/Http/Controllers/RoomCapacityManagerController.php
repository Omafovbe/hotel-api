<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RoomCapacityManager;

class RoomCapacityManagerController extends Controller
{
    //
     public function index()
    {
    	//All room capacities by name
    	return RoomCapacityManager::all();
    }

    public function show(RoomCapacityManager $roomCapacityManager)
    {
    	//Single room capacity
    	return $roomCapacityManager;
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, ['room_capacity_name' => 'required']);

    	//Save to DB
    	$roomCapacityManager = RoomCapacityManager::create($request->only(['room_capacity_name']));

    	$return response()->json(['message'=>'success', 'data'=>$roomTypeManager], 201);
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
    	//Delete a single room capacity type
    	$roomTypeManager->delete()
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
