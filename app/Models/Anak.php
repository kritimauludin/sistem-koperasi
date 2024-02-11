<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $fillable = ['anggota_id', 'nama', 'pendidikan', 'sekolah'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
