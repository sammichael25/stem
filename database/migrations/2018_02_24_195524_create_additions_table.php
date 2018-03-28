<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('career');
            $table->string('shirt');
            $table->string('allergy');
            $table->string('meal');
            $table->string('type');
            $table->string('btype')->nullable();
            $table->string('shoe')->nullable();
            $table->string('degree')->nullable();
            $table->integer('stemcenter_id')->unsigned();
            $table->foreign('stemcenter_id')->references('id')->on('stemcenters');
            $table->string('yr');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('additions');
    }
}
