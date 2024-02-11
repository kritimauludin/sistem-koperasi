<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id', 'tgl', 'pokok', 'wajib', 'sukarela'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

}
