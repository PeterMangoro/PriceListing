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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
             $table->string('slug')->nullable()->index();
            $table->string('type')->index();
        });

        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->string('slug')->nullable()->index();
            $table->string('type')->index();
        });

        Schema::create('transport_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->string('slug')->nullable()->index();
            $table->string('type')->index();
        });

        Schema::create('accommodation_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->string('slug')->nullable()->index();
            $table->string('type')->index();
        });

        Schema::create('car_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->string('slug')->nullable()->index();
            $table->string('type')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('accommodation_categories');
        Schema::dropIfExists('transport_categories');
        Schema::dropIfExists('service_categories');
        Schema::dropIfExists('car_categories');
    }
};
