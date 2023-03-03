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
        Schema::table('products', function (Blueprint $table) {
            $table->text('detail')->fullText()->change();
            $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->text('detail_normalized')->virtualAs("regexp_replace(detail,'[^A-Za-z0-9]','')")->index();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->text('detail')->fullText()->change();
            $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->text('detail_normalized')->virtualAs("regexp_replace(detail,'[^A-Za-z0-9]','')")->index();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->text('detail')->fullText()->change();
            // $table->string('title_normalized')->virtualAs("regexp_replace(title,'[^A-Za-z0-9]','')")->index();
            $table->text('detail_normalized')->virtualAs("regexp_replace(detail,'[^A-Za-z0-9]','')")->index();
        });

        Schema::table('plots', function (Blueprint $table) {
            $table->text('detail')->fullText()->change();
            $table->string('location_normalized')->virtualAs("regexp_replace(location,'[^A-Za-z0-9]','')")->index();
            $table->text('detail_normalized')->virtualAs("regexp_replace(detail,'[^A-Za-z0-9]','')")->index();
        });

        Schema::table('accommodations', function (Blueprint $table) {
            $table->text('detail')->fullText()->change();
            $table->string('location_normalized')->virtualAs("regexp_replace(location,'[^A-Za-z0-9]','')")->index();
            $table->text('detail_normalized')->virtualAs("regexp_replace(detail,'[^A-Za-z0-9]','')")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
