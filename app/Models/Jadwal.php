<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = "id_jadwal";
    protected $guarded = [];

    public function mata_kuliah()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_matkul', 'id_matkul');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'id_waktu', 'id_waktu');
    }
}