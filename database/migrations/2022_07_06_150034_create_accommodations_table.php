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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_visits')->index()->nullable();
            $table->uuid('uuid')->index();
            $table->foreignId('user_id')->nullable();
            $table->integer('a_rooms')->index();
            $table->integer('t_rooms')->nullable()->index();
            $table->string('location')->nullable()->index();
            // $table->string('location_normalized')->virtualAs("regexp_replace(location,'[^A-Za-z0-9]','')")->index();
            $table->float('price', 12, 2)->index();
            $table->text('detail')->nullable();
            $table->boolean('sale_status')->default(true)->index();
            $table->boolean('rental_status')->default(true)->index();
            $table->boolean('lodge_status')->default(true)->index();
            $table->softDeletes();
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
        Schema::dropIfExists('accommodations');
    }
};
