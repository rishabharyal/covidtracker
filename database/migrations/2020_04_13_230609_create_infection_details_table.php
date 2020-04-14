<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infection_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('remarks');
            $table->unsignedBigInteger('infected_place_id')->nullable();
            $table->dateTime('infected_date');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('infected_place_id')->references('id')->on('infected_places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infection_details');
    }
}
