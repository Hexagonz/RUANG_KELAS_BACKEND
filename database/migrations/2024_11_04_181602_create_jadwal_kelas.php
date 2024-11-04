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
        Schema::create('jadwal_kelas', function (Blueprint $table) {
            $table->id(); // Menambahkan ID untuk tabel pivot
            $table->unsignedBigInteger('id_jadwal');
            $table->unsignedBigInteger('id_kelas');
            $table->timestamps();

            // Mendefinisikan foreign key
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');

            // Menambahkan unique constraint agar tidak ada duplikat pasangan
            $table->unique(['id_jadwal', 'id_kelas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kelas');
    }
};
