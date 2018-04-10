<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterattendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centerattendances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('last_session_date');
            $table->integer('last_session_total');
            $table->integer('last_session_males');
            $table->integer('last_session_females')->nullable();
            $table->integer('stemcenter_id')->unsigned();
            $table->foreign('stemcenter_id')->references('id')->on('stemcenters');
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
        Schema::dropIfExists('centerattendances');
    }
}
