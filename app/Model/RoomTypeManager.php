<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomTypeManager extends Model
{
    
	protected $fillable = ['room_type_name'];

    //Defining the Many-to-Many relationship for roomCapacity and roomType
    public function roomCapacityManager()
    {
    	return $this->belongsToMany('App\Model\RoomCapacityManager', 'room_managers', 'room_type_id', 'room_capacity_id')
    }

    
}
