<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->text('coordinates')->nullable();

            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->unsignedBigInteger('place_type_id')->nullable();

            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->foreign('place_type_id')->references('id')->on('place_types');
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
        Schema::dropIfExists('addresses');
    }
}
