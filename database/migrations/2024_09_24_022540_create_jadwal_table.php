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
            $table->enum('kelas', ["A","B","C","D","E"]);
            $table->enum('hari', ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"]);
            $table->enum('semester',[1,2,3,4,5,6]);
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->timestamps();
            $table->foreign('id_matkul')->references('id_matkul')->on('mata_kuliah');
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
