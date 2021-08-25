<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateProcedureCountOfUnreadMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `pr_count_unread_messages`;
        CREATE PROCEDURE `pr_count_unread_messages` (IN id bigint)
        BEGIN
        SELECT count(seen),user_id FROM `messages` WHERE friend_id = id and seen = false
        GROUP BY user_id;
        END;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_count_of_unread_messages');
    }
}
