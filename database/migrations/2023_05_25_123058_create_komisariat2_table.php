<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomisariatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisariat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_komisariat');
            $table->string('nama_komisariat');

            $table->unsignedBigInteger('kader_id');
            $table->foreign('kader_id')->references('id')->on('kader');

            $table->string('akun_media_sosial');
            $table->string('asal_fakultas');
            $table->string('struktur_organisasi');
            $table->binary('foto')->nullable();
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
        Schema::dropIfExists('komisariat');
    }
}
