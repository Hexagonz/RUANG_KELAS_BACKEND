<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        "id_dosen",
        "nip",
        "nama_dosen"
    ];
    protected $primaryKey = 'id_dosen';
}
