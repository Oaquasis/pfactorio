<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModModpackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mod_modpack', function (Blueprint $table) {
            $table->unsignedInteger('mod_id');
            $table->unsignedInteger('modpack_id');
            $table->timestamps();
        });

        Schema::table('mod_modpack', function (Blueprint $table) {
            $table->foreign('mod_id')->references('id')->on('mods')->onDelete('cascade');
            $table->foreign('modpack_id')->references('id')->on('modpacks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mod_modpack', function(Blueprint $table) {
            $table->dropForeign(['mod_id', 'modpack_id']);
        });

        Schema::dropIfExists('mod_modpack');
    }
}
