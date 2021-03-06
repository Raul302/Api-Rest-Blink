<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_directions', function (Blueprint $table) {
            $table->id();
            $table->integer('id_contact');
            $table->string('typeAddress')->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('state')->nullable(true);
            $table->string('street')->nullable(true);
            $table->string('number')->nullable(true);
            $table->string('cp')->nullable(true);
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
        Schema::dropIfExists('contact_directions');
    }
}
