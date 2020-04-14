<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('identity_type', 32)->default('citizenship');
            $table->string('identity_number', 128)->unique();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->string('phone_country', 5)->default('+977');
            $table->string('phone_number', 16)->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->boolean('is_infected')->default(0);
            $table->smallInteger('role')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('referrer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
