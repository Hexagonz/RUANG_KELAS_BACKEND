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
    protected $fillable = [
        "id_matkul",
        "id_kelas",
        "kelas",
        "semester",
        "waktu_mulai",
        "waktu_selesai",
        "hari"    
    ];
    public function mata_kuliah()
    {
        return $this->belongsTo(Mata_kuliah::class, 'id_matkul', 'id_matkul');
    }

    public function kelasz()
    {
        return $this->belongsToMany(Kelas::class, 'jadwal_kelas', 'id_jadwal', 'id_kelas');
    }
}