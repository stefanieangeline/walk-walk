<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_hotels_rating AFTER INSERT ON reviews FOR EACH ROW
            BEGIN
                UPDATE hotels
                JOIN reviews ON reviews.IDHotel = hotels.IDHotel
                SET hotels.RatingHotel = (hotels.RatingHotel + reviews.Rating)/2
                WHERE reviews.IDReview = NEW.IDReview;
            END;


        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER trigger_hotels_rating');
    }
};''