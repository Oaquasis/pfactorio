<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('eventtype_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('eventtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('styling')->nullable();
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('eventtype_id')->references('id')->on('eventtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['eventtype_id']);
        });

        Schema::dropIfExists('events');
        Schema::dropIfExists('eventtypes');
    }
}
