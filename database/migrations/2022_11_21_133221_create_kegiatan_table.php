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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime_mulai');
            $table->dateTime('datetime_akhir')->nullable();
            $table->boolean('is_lomba');
            $table->bigInteger('id_lomba')->nullable()->unsigned()->unique();
            $table->timestamps();

            $table->foreign('id_lomba')
              ->references('id')->on('lomba')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
};
