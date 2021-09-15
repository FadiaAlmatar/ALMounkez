<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateProcedureLastMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `pr_last_message`;
        CREATE PROCEDURE `pr_last_message` (IN id bigint,IN fid int)
        BEGIN
        SELECT user_id,friend_id,message_content,created_at,group_id FROM `messages` WHERE  user_id = id AND friend_id= fid OR user_id = fid AND friend_id= id
        ORDER BY created_at DESC LIMIT 1;
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
        Schema::dropIfExists('procedure_last_message');
    }
}
