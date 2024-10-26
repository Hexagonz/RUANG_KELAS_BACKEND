<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $primaryKey = "id_fasilitas";
    protected $fillable = [
        "nama"
    ];
    protected $guarded = [];
}
