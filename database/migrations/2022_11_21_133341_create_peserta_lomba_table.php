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
        Schema::create('peserta', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Id lomba
            $table->string('username');
            $table->json('kategori');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id')
              ->references('id')->on('lomba')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('username')
              ->references('username')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
};
