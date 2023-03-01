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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_visits')->index()->default(0);
            $table->uuid('uuid')->index();
            $table->foreignId('user_id');
            $table->boolean('transport')->default(false)->index();
            $table->foreignId('car_make_id')->nullable();
            $table->foreignId('car_model_id')->nullable();
            $table->string('num_plate')->nullable();
            $table->text('detail')->nullable();
            $table->float('price', 12, 2)->nullable()->index();
            $table->boolean('sale_status')->default(false)->nullable();
            $table->boolean('rent_status')->default(false)->nullable();
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
        Schema::dropIfExists('cars');
    }
};
