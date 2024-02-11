<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id', 'pinjaman_id', 'lama', 'sisa', 'jumlah'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
