<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStemcentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stemcenters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('wifiPassword')->nullable();
            $table->integer('males');
            $table->integer('females');
            $table->integer('busary')->nullable();
            $table->integer('last_session_total');
            $table->date('last_session');
            $table->integer('school_id')->unsigned()->index()->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('stemcenters');
    }
}
