<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nik', 'jeniskelamin', 'tgl', 'jenis', 'kategori', 'alamat'];


    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function pasangan()
    {
        return $this->hasMany(Pasangan::class);
    }

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class);
    }

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }

    public function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }
}
