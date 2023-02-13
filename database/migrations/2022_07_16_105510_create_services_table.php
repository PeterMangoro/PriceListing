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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_visits')->index()->nullable();
            $table->uuid('uuid')->index();
            $table->foreignId('user_id')->nullable();
            $table->string('title')->index();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->text('detail')->nullable();
            $table->boolean('sale_status')->default(true)->index();
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
        Schema::dropIfExists('services');
    }
};
