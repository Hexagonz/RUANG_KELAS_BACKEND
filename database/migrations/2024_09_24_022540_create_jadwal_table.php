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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jadwal')->autoIncrement();
            $table->unsignedBigInteger('id_matkul')->unique();
            $table->unsignedBigInteger('id_kelas')->unique();
            $table->unsignedBigInteger('id_waktu')->unique();
            $table->string('kelas');
            $table->string('semester');
            $table->timestamps();
            $table->foreign('id_matkul')->references('id_matkul')->on('mata_kuliah');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_waktu')->references('id_waktu')->on('waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
