<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('sex');
            $table->date('dob')->nullable();
            $table->string('degree')->nullable();
            $table->string('driver');            
            $table->string('status');            
            $table->string('subject')->nullable();            
            $table->string('shirt')->nullable();            
            $table->string('allergy')->nullable();            
            $table->string('meal')->nullable();            
            $table->string('type');            
            $table->string('yr');
            $table->string('region');                        
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('contact_id')->unsigned()->index();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
}
