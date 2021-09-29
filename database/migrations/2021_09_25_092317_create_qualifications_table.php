<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('qualification')->nullable();//المؤهل
            $table->string('university')->nullable();//الجامعه
            $table->string('country')->nullable();//البلد
            $table->integer('graduation_year')->nullable();//سنة التخرج
            $table->float('graduation_rate')->nullable();//معدل التخرج
            $table->string('Specialization')->nullable();//التخصص
            $table->foreignId('order_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
