<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerManager extends Model
{
    //
    protected $table = 'customer_managers';
    protected $fillable = [
    	'cust_firstname',
    	'cust_lastname',
    	'cust_address',
    	'cust_city',
    	'cust_country',
    	'cust_phone',
    	'cust_fax',
    	'cust_email',
    ];
}
