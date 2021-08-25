<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedureMessagesFriends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('procedure_messages_friends', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        $procedure = "DROP PROCEDURE IF EXISTS `pr_messages_friends`;
        CREATE PROCEDURE `pr_messages_friends` (IN id bigint)
        BEGIN
         SELECT DISTINCT user_id FROM messages WHERE friend_id = id
        UNION
         SELECT DISTINCT friend_id FROM messages WHERE user_id = id;
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
        Schema::dropIfExists('procedure_messages_friends');
    }
}
