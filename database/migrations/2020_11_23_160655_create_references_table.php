<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_ref');
            $table->string('name_ref')->nullable(true);
            $table->string('father_lastname')->nullable(true);;
            $table->string('mother_lastname')->nullable(true);;
            $table->string('email')->nullable(true);
            $table->string('phone')->nullable(true);
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
        Schema::dropIfExists('references');
    }
}
