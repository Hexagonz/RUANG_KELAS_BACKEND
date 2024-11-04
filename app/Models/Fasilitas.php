<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $primaryKey = "id_fasilitas";
    protected $fillable = [
        "id_fasilitas",
        "nama"
    ];
    protected $guarded = [];
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_fasilitas', 'id_fasilitas', 'id_kelas');
    }
}
