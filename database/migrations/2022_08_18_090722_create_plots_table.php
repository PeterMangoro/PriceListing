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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_visits')->index()->nullable();
            $table->uuid('uuid')->index();
            $table->foreignId('user_id');
            $table->float('size',12,2)->index();
            $table->float('price',12,2)->index();
            $table->text('detail');
            $table->string('location')->index();
            $table->boolean('sale_status');
            // $table->string('location_normalized')->virtualAs("regexp_replace(location,'[^A-Za-z0-9]','')")->index();
            
            
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
        Schema::dropIfExists('plots');
    }
};
