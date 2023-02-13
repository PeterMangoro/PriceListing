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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->foreignId('user_id');
            // $table->string('title');
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            // $table->string('url')->unique()->index();
            $table->string('mission')->nullable();
            $table->string('vision')->nullable();
            $table->text('company_values')->nullable();
            $table->text('history')->nullable();
            $table->year('year')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
