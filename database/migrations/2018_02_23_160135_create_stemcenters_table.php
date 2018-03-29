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
            $table->integer('males')->default('0');
            $table->integer('females')->default('0');
            $table->integer('busary')->default('0')->nullable();
            $table->integer('incidents')->default('0');
            $table->integer('last_session_total')->default('0');
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
