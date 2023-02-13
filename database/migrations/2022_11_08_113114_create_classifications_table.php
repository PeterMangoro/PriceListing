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
        Schema::create('accommodation_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accommodation_category_id');
            $table->foreignId('accommodation_id');            
        });

        Schema::create('car_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_category_id');
            $table->foreignId('car_id');            
        });

        Schema::create('product_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id');
            $table->foreignId('product_id');            
        });

        Schema::create('service_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id');
            $table->foreignId('service_id');            
        });

        Schema::create('transport_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transport_category_id');
            $table->foreignId('transport_id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodation_classifications');
        Schema::dropIfExists('car_classifications');
        Schema::dropIfExists('product_classifications');
        Schema::dropIfExists('service_classifications');
        Schema::dropIfExists('transport_classifications');
    }
};
