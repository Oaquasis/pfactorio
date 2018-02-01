<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('download_url');
            $table->string('file_name');
            $table->string('factorio_version');
            $table->string('version');
            $table->dateTime('released_at');
            $table->timestamps();

            $table->integer('mod_id')->unsigned()->index();
            $table->foreign('mod_id')->references('id')->on('mods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('releases', function(Blueprint $table) {
            $table->dropForeign(['mod_id']);
        });

        Schema::dropIfExists('releases');
    }
}
