<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('hari');
            $table->date('tanggal');
            $table->time('checkin');
            $table->time('checkout')->nullable();
            $table->integer('total')->nullable();
            $table->bigInteger('gaji')->nullable();
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
        Schema::dropIfExists('absensi');
    }
}