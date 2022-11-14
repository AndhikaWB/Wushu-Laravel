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
        Schema::create('biodata_ortu', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nama_wali');
            $table->string('no_hp');
            $table->timestamps();

            $table->foreign('username')
              ->references('username')->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_ortu');
    }
};
