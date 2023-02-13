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
        Schema::create('item_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('accommodation_id')->nullable();
            $table->foreignId('car_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->foreignId('transport_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_team');
    }
};
