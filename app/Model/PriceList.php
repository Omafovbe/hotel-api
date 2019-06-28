<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    //
    protected $fillable = [
    	'room_type',
    	'room_capacity',
    	'amount',
    ];
}
