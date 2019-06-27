<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelDetails extends Model
{
    
    protected $fillable = [
    	'name',
    	'address',
    	'city',
    	'state',
    	'country',
    	'zipcode',
    	'email',
    	'phone_number',
    	'image',
    ];


    //Hotel Details create relationship
    public function roomManager()
    {
    	return $this->hasMany(RoomManager::class);
    }
}
