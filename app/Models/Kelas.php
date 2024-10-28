<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kelas";
    protected $fillable = [
        "nama_kelas",
        "lokasi",
        "status",
        "kapasitas",
        "id_fasilitas",
        "image_1",
        "image_2",
        "image_3"
    ];

    public function Kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
