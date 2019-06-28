<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CustomerManager;

class CustomerManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//All Customers
    	return CustomerManager::all();
    }

    public function show(CustomerManager $customerManager)
    {
    	//Single customer
    	return $customerManager;
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

    	return response()->json(['message'=>'success', 'data'=>$custManager], 201);
    }


    public function update(Request $request, $id)
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
    		'cust_email' => 'required|unique:customer_managers,cust_email,'.$id.',id',
    	]);


    	//Save to DB
        $customerManager = CustomerManager::findOrFail($id);

        $customerManager->update($request->all());

        return response()->json(['message'=>'updated successfuly', 'data' => $customerManager], 200);
    }

    public function destroy(CustomerManager $customerManager)
    {
    	//Delete a single room type
    	$customerManager->delete();
    	return response()->json([
    		'message' => 'Deleted Successfully!'], 204);
    }
}
