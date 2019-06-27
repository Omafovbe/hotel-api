<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CustomerManager;

class CustomerManagerController extends Controller
{
    //
     public function index()
    {
    	//All Customers
    	return CustomerManager::all();
    }

    public function show(CustomerManager $custManager)
    {
    	//Single customer
    	return $custManager;
    }

    public function store(Request $request)
    {
    	//Validate entries
    	$this->validate($request, [
    		'cust_firstname' => 'required',
    		'cust_lastname' => 'required',
    		'cust_address' => 'nullable',
    		'cust_city' => 'nullable',
    		'cust_country' => 'required',
    		'cust_phone' => 'required',
    		'cust_fax' => 'nullable',
    		'cust_email' => 'required|email|unique:customer_managers'
    	]);

    	//Save to DB
    	$custManager = CustomerManager::create($request->only([
    		'cust_firstname',
    		'cust_lastname',
    		'cust_address',
    		'cust_city',
    		'cust_country',
    		'cust_phone',
    		'cust_fax',
    		'cust_email',
    ]));

    	$return response()->json(['message'=>'success', 'data'=>$custManager], 201);
    }

    public function update(Request $request, CustomerManager $custManager)
    {
        //Validate entries
        $this->validate($request, [
    		'cust_firstname' => 'required',
    		'cust_lastname' => 'required',
    		'cust_address' => 'nullable',
    		'cust_city' => 'nullable',
    		'cust_country' => 'required',
    		'cust_phone' => 'required',
    		'cust_fax' => 'nullable',
    		'cust_email' => 'required|email|unique:customer_managers'
    	]);


    	//Save to DB
        $custManager->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $custManager], 200);
    }

    public function destroy(CustomerManager $custManager)
    {
    	//Delete a single room type
    	$custManager->delete()
    	return response()->json([
            'message' => 'Deleted Successfully!'
        ], 204);
    }
}
