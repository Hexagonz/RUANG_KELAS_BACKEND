<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kelas";
    protected $fillable = [
        "id_kelas",
        "nama_kelas",
        "lokasi",
        "status",
        "kapasitas",
        "index_kelas",
        "id_fasilitas",
        "image_1",
        "image_2",
        "image_3"
    ];

    public function Kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public static function createOrUpdate(array $data)
    {
        // Cek apakah id_kelas ada dalam data
        if (isset($data['id_kelas'])) {
            // Jika ada, lakukan update
            $kelas = self::find($data['id_kelas']);
            if ($kelas) {
                $kelas->update($data);
                return $kelas; // Kembalikan objek yang diperbarui
            }
        }

        // Jika tidak ada, lakukan create
        return self::create($data); // Kembalikan objek yang baru dibuat
    }
}
