<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perkaderan_kader', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('kader_id');
            $table->foreign('kader_id')->references('id')->on('kader');

            $table->unsignedBigInteger('perkaderan_id');
            $table->foreign('perkaderan_id')->references('id')->on('perkaderan');

            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perkaderan_kader');
    }
};
