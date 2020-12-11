<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('country');
            $table->string('website');
            $table->string('description')->nullable(true);
            $table->integer('start_boarding_grade')->nullable(true);
            $table->integer('end_boarding_grade')->nullable(true);
            $table->integer('start_day_grade')->nullable(true);
            $table->integer('end_day_grade')->nullable(true);
            $table->integer('total_boarding_grade')->nullable(true);
            $table->integer('total_international_grade')->nullable(true);
            $table->integer('total_day_students')->nullable(true);
            $table->integer('total_students_in_school')->nullable(true);
            $table->string('location')->nullable(true);
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
        Schema::dropIfExists('colleges');
    }
}
