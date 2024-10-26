<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    use HasFactory;
    protected $table = "mata_kuliah";
    protected $primaryKey = "id_matkul";
    protected $fillable = [
        "nama_matkul",
        "sks",
        "id_dosen"
    ];
    public function MataKuliah(){
        return $this->belongsTo(Mata_kuliah::class);
    }
}
