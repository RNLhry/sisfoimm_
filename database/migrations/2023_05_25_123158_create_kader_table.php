<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kader', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('nim',8);
            $table->char('angkatan',4);
            $table->string('tempat_tanggal_lahir');
            
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan');

            $table->enum ('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->char('no_telp');
            $table->string('alamat');
            $table->string('nama_bapak');
            $table->string('nama_ibu');
            $table->date('tahun_berkader');
            $table->string('jabatan');

            $table->unsignedBigInteger('komisariat_id');
            $table->foreign('komisariat_id')->references('id')->on('komisariat');

            $table->binary('foto')->nullable(true);
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
        Schema::dropIfExists('kader');
    }
}
