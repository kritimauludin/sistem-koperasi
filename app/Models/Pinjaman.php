<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $fillable = ['anggota_id', 'tgl', 'jumlah', 'lama', 'bunga', 'sisa'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
