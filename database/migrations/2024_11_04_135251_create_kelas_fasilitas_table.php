<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('fasilitas_kelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilitas_id');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreign('fasilitas_id')->references('id_fasilitas')->on('fasilitas')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');

            // Menambahkan index unik
            $table->unique(['fasilitas_id', 'kelas_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kelas');
    }
}
