<?php

namespace App\Http\Controllers;

use App\Model\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //response()->json(['message' => 'Here you are price list'], 200);
        return  PriceList::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'room_capacity' => 'required',
            'room_type' => 'required',
            'amount' => 'required',
        ]);

        //Save to DB
        $priceList = PriceList::create($request->only([
            'room_capacity',
            'room_type',
            'amount',
        ]));

        //Display to JSON Data
        return response()->json(['message'=>'success', 'data'=>$priceList], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
                
        //Search through the list either with room type or both type and capacity
        
        $priceList = PriceList::where('room_type', $request->input('room_type'))
                    ->orWhere('room_capacity', $request->input('room_capacity'))
                    ->get();
        
        return response()->json(['data'=> $priceList]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function show(PriceList $priceList)
    {
        return $priceList;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceList $priceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceList $priceList)
    {
        //
        $this->validate($request, [
            'room_capacity' => 'required',
            'room_type' => 'required',
            'amount' => 'required',
        ]);

        $priceList->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $priceList], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PriceList  $priceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceList $priceList)
    {
        $priceList->delete();
        return response()->json([
            'message' => 'Deleted Successfully!'], 204);
    }
}
