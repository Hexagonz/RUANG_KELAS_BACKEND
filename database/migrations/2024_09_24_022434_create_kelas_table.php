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
        Schema::create('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kelas')->autoIncrement();
            $table->enum('nama_kelas',["TI 1","TI 2","TI 3","TI 4","TI 5","TI 6", "TI 7", "TI 8", "TI 9", "TI 10","TI 11","TI 12","TI 13","TI 14"]);
            $table->enum('lokasi',['Teori', 'LAB']);
            $table->enum('status', ['Tersedia', 'Tidak Tersedia']);
            $table->integer('kapasitas');
            $table->integer('index_kelas');
            $table->unsignedBigInteger('id_fasilitas');
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('fasilitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
