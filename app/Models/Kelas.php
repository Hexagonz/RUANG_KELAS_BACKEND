<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // Nama tabel di database
    protected $primaryKey = "id_kelas";
    // Daftar kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_kelas',
        'lokasi',
        'status',
        'kapasitas',
        'image_1',
        'image_2',
        'image_3',
    ];

    /**
     * Relasi ke model Fasilitas melalui tabel pivot kelas_fasilitas.
     */
    public function fasilitas()
    {
        return $this->belongsToMany(Fasilitas::class, 'fasilitas_kelas', 'kelas_id', 'fasilitas_id');
    }
    
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_kelas', 'id_kelas', 'id_jadwal');
    }
    
}
