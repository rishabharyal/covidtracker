<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentlyVisitedLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recently_visited_locations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('used_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();

            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();

            $table->foreign('used_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
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
        Schema::dropIfExists('recently_visited_locations');
    }
}
