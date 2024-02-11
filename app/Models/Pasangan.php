<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id', 'nama', 'pekerjaan'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
