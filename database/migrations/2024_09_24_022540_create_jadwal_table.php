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
            $table->unsignedBigInteger('id_matkul');
            $table->unsignedBigInteger('id_kelas');
            $table->enum('kelas', ["A","B","C","D","E"]);
            $table->enum('semester',[1,2,3,4,5,6]);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->timestamps();
            $table->foreign('id_matkul')->references('id_matkul')->on('mata_kuliah');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
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
