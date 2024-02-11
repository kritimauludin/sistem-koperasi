<?php

namespace App\Exports;

use App\Models\Simpanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class SimpananExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('pages.simpanan.export', [
            'simpanans' => Simpanan::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Tanggal dibayar', 'Simpanan Pokok', 'Simpanan Wajib', 'Simpanan Sukarela'],
        ]);
    }
}
