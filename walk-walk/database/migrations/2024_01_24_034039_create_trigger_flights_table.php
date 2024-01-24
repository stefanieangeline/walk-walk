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
        
            CREATE TRIGGER trigger_flights AFTER INSERT ON plane_tickets FOR EACH ROW
            BEGIN
                UPDATE schedule_details
                JOIN schedules ON schedules.IDSchedule = schedule_details.IDSchedule
                JOIN plane_ticket_details ON plane_ticket_details.IDPlaneTicket = NEW.IDPlaneTicket
                SET schedule_details.Seat = schedule_details.Seat - (
                    SELECT COUNT(plane_ticket_details.IDPassenger) 
                    FROM plane_ticket_details 
                    WHERE plane_ticket_details.IDPlaneTicket = NEW.IDPlaneTicket
                )
                WHERE schedules.IDSchedule = NEW.IDSchedule;
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
        DB::unprepared('DROP TRIGGER trigger_flights');
    }
};
