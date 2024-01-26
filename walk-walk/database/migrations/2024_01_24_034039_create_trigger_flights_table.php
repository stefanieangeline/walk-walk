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
     * JOIN schedules ON schedules.IDSchedule = schedule_details.IDSchedule
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_flights AFTER INSERT ON plane_ticket_details FOR EACH ROW
            BEGIN
                UPDATE schedule_details
                JOIN plane_tickets ON plane_tickets.IDSchedule = schedule_details.IDSchedule
                JOIN plane_ticket_details ON plane_ticket_details.IDPlaneTicket =  plane_tickets.IDPlaneTicket 
                SET schedule_details.Seat = schedule_details.Seat - 1
                WHERE schedule_details.Class = NEW.Class AND plane_ticket_details.IDPlaneTicket = NEW.IDPlaneTicket;
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
