<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->foreignId('user_id')->nullable(); #this will be used by schools to assign a student to a dorm
            $table->foreignId('payment_id')->nullable(); #this will be used by hotels to show amount paid by a person for the room
            $table->string('guest')->nullable(); #this will be used by hotels to assign a guests to a room
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_users');
    }
};
