<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    use HasFactory;

    public function Mata_kuliah(){
        return $this->belongsTo(Mata_kuliah::class);
    }
}
