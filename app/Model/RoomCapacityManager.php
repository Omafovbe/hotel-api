<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomCapacityManager extends Model
{
	protected $fillable = ['room_capacity_name'];
	protected $table = 'room_capacity_managers';

    //Defining the Many-to-Many relationship for roomCapacity and roomType
    public function roomTypeManager()
    {
    	return $this->belongsToMany('App\Model\RoomTypeManager', 'room_managers', 'room_capacity_id', 'room_type_id');
    }

  
}
