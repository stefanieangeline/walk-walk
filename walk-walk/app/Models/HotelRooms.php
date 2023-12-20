<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    use HasFactory;

     public function facilities()
    {
        return $this->hasMany(RoomFacilityDetails::class, 'IDHotel', 'IDHotel');
    }
}
