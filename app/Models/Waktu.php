<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'waktu';

    protected $primaryKey = 'id_waktu';

    public function Waktu(){
        return $this->belongsTo(Waktu::class);
    }
}
