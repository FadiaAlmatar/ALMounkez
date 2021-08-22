<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedureUnreadMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('procedure_unread_messages', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        $procedure = "DROP PROCEDURE IF EXISTS `pr_unread_messages`;
        CREATE PROCEDURE `pr_unread_messages` (IN id bigint)
        BEGIN
         SELECT DISTINCT user_id FROM messages WHERE friend_id = id AND seen = false;
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
        Schema::dropIfExists('procedure_unread_messages');
    }
}
