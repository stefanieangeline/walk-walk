<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacilityDetails extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(HotelRooms::class, 'IDHotel', 'IDHotel');
    }

}
