<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomCapacityManager extends Model
{
	protected $fillable = ['room_capacity_name'];

    //Defining the Many-to-Many relationship for roomCapacity and roomType
    public function roomTypeManager()
    {
    	return $this->belongsToMany('App\Model\RoomTypeManager', 'room_managers', 'room_type_id', 'room_capacity_id')
    }

  
}
