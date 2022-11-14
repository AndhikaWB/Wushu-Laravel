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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('sabuk');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->json('prestasi')->nullable();
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
        Schema::dropIfExists('biodata');
    }
};
