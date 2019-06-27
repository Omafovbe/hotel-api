<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomManager extends Model
{
    //
     protected $fillable = [
    	'room_name',
    	'hotel_id',
    	'room_type_id',
    	'room_capacity_id',
    	'room_image',
    ];


    public function hotelDetails()
    {
    	return $this->belongsTo(HotelDetails::class);
    }
}
