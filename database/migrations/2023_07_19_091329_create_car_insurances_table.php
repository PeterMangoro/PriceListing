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
        Schema::create('car_insurances', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->foreignId('user_id');
            $table->string('owner'); 
            // $table->string('owner_id_number');           
            $table->text('contact');
            $table->string('car_title');
            $table->string('car_reg');
            $table->string('zimra')->nullable();
            $table->string('car_insurance')->nullable();
            $table->date('reg_date');
            $table->date('reg_exp');            
            $table->timestamps();
            $table->string('car_title_normalized')->virtualAs("regexp_replace(car_title,'[^A-Za-z0-9]','')")->index();
            $table->string('owner_normalized')->virtualAs("regexp_replace(owner,'[^A-Za-z0-9]','')")->index();
            $table->string('car_reg_normalized')->virtualAs("regexp_replace(car_reg,'[^A-Za-z0-9]','')")->index();
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
        Schema::dropIfExists('car_insurances');
    }
};
