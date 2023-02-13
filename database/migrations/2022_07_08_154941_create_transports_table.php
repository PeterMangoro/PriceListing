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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_visits')->index()->nullable();
            $table->uuid('uuid');
            $table->foreignId('user_id');
            $table->foreignId('car_id');
            $table->string('destination')->index();
            // $table->string('destination_normalized')->virtualAs("regexp_replace(destination,'[^A-Za-z0-9]','')")->index();
            $table->string('departure')->index();
            // $table->string('departure_normalized')->virtualAs("regexp_replace(departure,'[^A-Za-z0-9]','')")->index();
            $table->string('date');
            $table->float('price',12,2)->index();
            $table->integer('passengers')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('transports');
    }
};
